<?php

namespace App\Http\Livewire;

use Newsletter;
use App\Models\Blog;
use Livewire\Component;
use Livewire\WithPagination;
use App\Mail\WelcomeSubscriber;
use Illuminate\Support\Facades\Mail;
use App\Models\NewsletterSubscription;
use App\Mail\ContactUsMail;


class LatestCategory extends Component
{
    public $name;
    public $subject;
    public $phone;
    public $message;
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

    function resetInput(){
        $this->name = '';
        $this->subject = '';
        $this->message = '';
        $this->phone = '';
    }

    function send(){
        $this->validate([
            'name' => 'required',
            'phone' => 'nullable',
            'message' => 'nullable',
        ]);
        
        $subject = "Request for a Service";
    
        Mail::to('info@pullmanexcavatorskenya.com')->send(new ContactUsMail($this->name, $this->subject, $this->message, $this->phone));
    
        $this->resetInput();
        session()->flash('message', 'Your message has been sent.');
    }
}
