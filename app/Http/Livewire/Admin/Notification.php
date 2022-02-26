<?php

namespace App\Http\Livewire\Admin;

use App\Models\User;
use Illuminate\Support\Facades\Mail;
use Livewire\Component;

class Notification extends Component
{
    public $title;
    public $description;
    public $emails;

    public function mount($id=null)
    {
        $this->emails =($id==null)?User::select('email')->get()->pluck('email')->toArray():[User::findOrFail($id)->email];
        $this->title = "";
        $this->description = "";
    }


    public function store()
    {

        $this->validate([
            'title' => ['required', 'string', 'max:255'],
            'description'=>['required','string'],
        ]);

        Mail::send('email-notification', ['content'=>$this->description], function($message) {
          $message->to($this->emails)
          ->subject($this->title);
        });
        $this->emit('toast','Mail Sent','','success');
    }
    public function render()
    {
        return view('livewire.admin.notification')->layout("layouts.app",['nav'=>view('admin.nav')])->slot('content');
    }
}
