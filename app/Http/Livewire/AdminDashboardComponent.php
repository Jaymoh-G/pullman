<?php

namespace App\Http\Livewire;

use App\Models\Blog;
use App\Models\Category;
use App\Models\User;
use App\Models\Event;
use Livewire\Component;
use App\Models\Publication;
use Livewire\WithPagination;
use App\Models\NewsletterSubscription;
use App\Models\Subscription;

class AdminDashboardComponent extends Component
{
    use WithPagination;
    public function render()
    {

        $userCount = Subscription::count();
        $publicationCount = Publication::count();
        $blogCategoryCount = Blog::join('categories', 'categories.id', '=', 'blogs.category_id')->where('categories.name', 'Press Releases')->count();
        $inNewsCount = Blog::join('categories', 'categories.id', '=', 'blogs.category_id')->where('categories.name', 'Power Shift in the News')->count();
        $eventCount = Event::count();
        $users = User::paginate(4);
        $blogs = Blog::all();
        return view('livewire.admin-dashboard-component', [
            'userCount' => $userCount,
            'publicationCount' => $publicationCount,
            'inNewsCount' => $inNewsCount,
            'blogCategoryCount' => $blogCategoryCount,
            'eventCount' => $eventCount,
            'users' => $users,
            'blogs' => $blogs

        ])->layout('layouts.base');
        //human readable date_create_from_format('Y-m-d H:i:s', $event->start_date)->format('d-m-Y');
    }
}
