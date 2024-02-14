<?php

namespace App\Http\Livewire;

use Newsletter;
use App\Models\Blog;
use Livewire\Component;
use Livewire\WithPagination;
use App\Mail\WelcomeSubscriber;
use Illuminate\Support\Facades\Mail;
use App\Models\NewsletterSubscription;

class LatestCategory extends Component
{
    public $name;
    public $email;
    public $title;

    public function render()
    {
        // get category from route
        $tag = request()->tag;
        $category = request()->categorySlug;
        $blogs = Blog::join('categories', 'categories.id', '=', 'blogs.category_id')
            ->select('blogs.*', 'categories.name as category_name', 'categories.slug as category_slug')
            ->where('categories.slug', '=', $category)
            ->when($tag, function ($query) use ($tag) {
                return $query->where('tags', 'like', '%' . $tag . '%');
            })
            ->orderBy('blogs.updated_at', 'desc')
            ->paginate(12);
        //get title
        if ($blogs[0]) {
            $this->title = $blogs[0]->category->name;
        }

        return view('livewire.latest-category', ['blogs' => $blogs])->layout('layouts.web', ['activePage' => 'latest']);
    }

    function mailchimpSubscribe()
    {
        $this->validate([
            'name' => 'required',
            'email' => 'required|email',
        ]);

        try {
            if (Newsletter::isSubscribed($this->email)) {
                $this->emptyInput();
                return redirect()->back()->with('message', 'You are already subscribed');
            } else {
                Newsletter::subscribe($this->email, ['FNAME' => $this->name, 'LNAME' => '']);
                $this->emptyInput();
                return redirect()->back()->with('message', 'You have successfully subscribed');
            }
        } catch (\Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }

    function emptyInput()
    {
        $this->name = null;
        $this->email = null;
    }
}
