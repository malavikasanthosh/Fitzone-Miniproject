<?php

namespace App\Http\Livewire\Trainer;

use Livewire\Component;
use App\Models\Profile;
use App\Models\User;

class Details extends Component

{
    public $name;
    public $gender;
    public $phone;
    public $dob;
    public $address;
    public $aadhar;

    public function mount(){

        $user = auth()->user();
        $profile=$user->profile;

        $this->name = $user->name;
        $this->gender=$profile?->gender??"";
        $this->phone=$profile?->phone??"";
        $this->dob=$profile?->dob??"";
        $this->address=$profile?->address??"";
        $this->aadhar=$profile?->aadhar??"";
    }

    public function store()
    {

        $this->validate([
            'name' => ['required', 'string', 'max:255'],
            'gender'=>['required','string','in:Male,Female'],
            'phone'=>['required','digits:10'],
            'dob'=>['required','date'/* ,'date_format:d/m/Y' */],
            'address'=>['required','string','min:3','max:1024'],
            'aadhar'=>['required','digits:12','unique:profiles,aadhar']
        ]);

        $user = auth()->user();

        if($this->name!=$user->name){
            $user->update(['name'=>$this->name]);
        }


        Profile::updateOrCreate(["user_id"=>$user->id],[
            'gender'=> $this->gender,
            'phone'=>$this->phone,
            'dob'=>$this->dob,
            'address'=>$this->address,
            'aadhar'=>$this->aadhar,
            'user_id'=>$user->id
        ]);

        $this->emit('toast','Profile Updated','','success');


    }

    public function render()
    {
        return view('livewire.trainer.details')->layout("layouts.app",['nav'=>view('trainer.nav  ')])->slot('content');
    }
}
