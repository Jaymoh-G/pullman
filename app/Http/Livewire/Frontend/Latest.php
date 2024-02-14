<?php

namespace App\Http\Livewire\Frontend;

use App\Models\Blog;
use App\Models\Event;
use Livewire\Component;
use Illuminate\Support\Str;

class Latest extends Component
{
  public function render()
  {
    $PressRelease = Blog::join('categories', 'blogs.category_id', '=', 'categories.id')
      ->select('blogs.*', 'categories.name as category_name', 'categories.slug as category_slug')
      ->where('categories.name', '=', 'Press Releases')
      ->orderBy('blogs.updated_at', 'desc')

      ->take(3)->get();

    $news = Blog::join('categories', 'blogs.category_id', '=', 'categories.id')
      ->select('blogs.*', 'categories.name as category_name', 'categories.slug as category_slug')
      ->where('categories.name', '=', 'Power Shift in the News')
      ->orderBy('blogs.updated_at', 'desc')

      ->take(3)->get();
    $events = Event::orderBy('date_from', 'desc')->take(3)->get();
    return view('livewire.frontend.latest', ['news' => $news, 'events' => $events, 'PressRelease' => $PressRelease])->layout('layouts.web', ['activePage' => 'latest']);
  }
}
