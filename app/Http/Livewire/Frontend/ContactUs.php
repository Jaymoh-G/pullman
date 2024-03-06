<?php

namespace App\Http\Livewire\Frontend;

use Livewire\Component;
use App\Mail\ContactUsMail;
use Illuminate\Support\Facades\Mail;

class ContactUs extends Component
{
    public $name;
    public $email;
    public $subject;
    public $message;
    public $phone;

    public function render(){
        return view('livewire.frontend.contact-us')->layout('layouts.web');
    }

    public function send(){
        $this->validate([
            'name' => 'required',
            
        ]);

        Mail::to('info@pullmanexcavatorskenya.com')->send(new ContactUsMail($this->name, $this->email, $this->subject, $this->message, $this->phone));

        $this->resetInput();
        session()->flash('message', 'Your message has been sent.');
    }

    function resetInput(){
        $this->name = '';
        $this->email = '';
        $this->subject = '';
        $this->message = '';
        $this->phone = '';
    }

}
