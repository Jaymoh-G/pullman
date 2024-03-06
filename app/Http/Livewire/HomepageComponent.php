<?php

namespace App\Http\Livewire;

use Newsletter;
use App\Models\Blog;
use App\Models\Event;
use Livewire\Component;
use App\Models\Category;
use App\Models\Petition;
use App\Models\Publication;
use App\Models\PageSectionData;
use App\Models\Page;
use App\Models\PageSection;
use App\Mail\WelcomeSubscriber;
use Illuminate\Support\Facades\Mail;

class HomepageComponent extends Component{
    public $title;
    public $name;
    public $email;
    public $publication;
    public $categories;
    public $latestPressRelease;
    public $petition;
    public $sliders;
    public $sectionOneData;
    public $sectionTwoData;
    public $News;

    public function mount(){
        $this->sectionOneData = $this->getSectionData('Crafting foundations, Building Africa');
        $this->sectionTwoData = $this->getSectionData('Our Mission');
        $this->sectionThreeData = $this->getSectionData('Join Us');
        $this->sliders = PageSectionData::where('type', 'slider')->orderBy('created_at', 'asc')->take(4)->get();
        $this->petition = Petition::orderBy('id', 'desc')->take(1)->get();
        $this->latestPressRelease = Blog::join('categories', 'blogs.category_id', '=', 'categories.id')
                ->select('blogs.*', 'categories.name as category_name', 'categories.slug as category_slug')
                ->where('categories.name', '=', 'Water and Sewer Works')
                ->take(3)->latest('blogs.updated_at')->get();
        $this->latestPowershiftNews = Blog::join('categories', 'blogs.category_id', '=', 'categories.id')
                ->select('blogs.*', 'categories.name as category_name', 'categories.slug as category_slug')
                ->where('categories.name', '=', 'Excavation and Dumping')
                ->take(2)->latest('blogs.updated_at')->get();

           $this->News = Blog::join('categories', 'blogs.category_id', '=', 'categories.id')
                ->select('blogs.*', 'categories.name as category_name', 'categories.slug as category_slug')
                ->where('categories.name', '=', 'News')
                ->take(2)->latest('blogs.updated_at')->get();

        $this->latestEvent = Event::orderBy('date_from', 'desc')->take(1)->get();
        $this->title = "Power shift Africa";
        $this->publications= Publication::orderBy('updated_at', 'desc')->take(2)->get();
    }

    public function render(){
        return view('livewire.homepage-component')->layout('layouts.web',['activePage'=>'home']);
    }

    public function setTitle($title){
        $this->title = $title;
    }

    function mailchimpSubscribe(){
        $this->validate([
            'name' => 'required',
            'email' => 'required|email',
        ]);

        try{
            if(Newsletter::isSubscribed($this->email)){
                $this->emptyInput();
                return redirect()->back()->with('message', 'You are already subscribed');
            }else{
                Newsletter::subscribe($this->email, ['FNAME' => $this->name, 'LNAME' => '']);
                Mail::to($this->email)->send(new WelcomeSubscriber($this->name, $this->email));
                $this->emptyInput();
                return redirect()->back()->with('message', 'You have successfully subscribed');
            }
        }catch(\Exception $e){
            return redirect()->back()->with('error', $e->getMessage());
        }
    }

    function emptyInput(){
        $this->name = null;
        $this->email = null;
    }

    function getSectionData($sectionName){
        return PageSectionData::join('page_sections', 'page_section_data.page_section_id', '=', 'page_sections.id')
                ->join('pages', 'page_sections.page_id', '=', 'pages.id')
                ->select('page_section_data.*', 'page_sections.name as page_section_name', 'pages.name as page_name')
                ->where('page_sections.name', 'like', '%'.$sectionName.'%')
                ->where('pages.name', 'like', '%homepage%')
                ->latest('page_sections.updated_at')->first();
    }

}
