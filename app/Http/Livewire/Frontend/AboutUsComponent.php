<?php

namespace App\Http\Livewire\Frontend;
use Newsletter;
use Livewire\Component;
use App\Mail\WelcomeSubscriber;
use Illuminate\Support\Facades\Mail;
use App\Models\NewsletterSubscription;
use App\Models\PageSectionData;

class AboutUsComponent extends Component
{
    public $name;
    public $email;
    public $whoWeAre;
    public $partners;

    public function mount(){
        $this->partners = PageSectionData::where('type', 'partner')->orderBy('id', 'desc')->get();    
        $this->whoWeAre = $this->getSectionData('Who we are');
        $this->foundingDirector = $this->getSectionData("Power Shift Africa's founding director");
        $this->ourMission = $this->getSectionData('Our mission');
        $this->ourVision = $this->getSectionData('Our vision');
        $this->ourGoals = $this->getSectionData('Our goals');
    }

    public function render(){
        return view('livewire.frontend.about-us-component')->layout('layouts.web',['activePage'=>'aboutUs']);
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
                ->where('pages.name', 'like', '%about us%')
                ->latest('page_sections.updated_at')->first();
    }

}
