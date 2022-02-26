<?php

namespace App\Http\Livewire\Trainer;

use App\Models\Attendance;
use App\Models\Timeslot;
use Livewire\Component;

class SessionMembers extends Component
{
    public $users;
    public $timeslot;

    public function mount($id)
    {
        $this->timeslot = Timeslot::findOrFail($id);
        $this->users= \App\Models\User::where('role','member')->whereHas('myPackages',function($q) use($id) {
            $q->where('package_id',auth()->user()->package_id)->where('timeslot_id',$id)->where('trainer_id',auth()->id());
        })->get();
    }

    public function attendence($my_package_id){
        Attendance::create(['my_package_id'=>$my_package_id]);
        $this->emit('toast','Attendance Marked','','success');

    }

    public function render()
    {
        return view('livewire.trainer.session-members')->layout("layouts.app",['nav'=>view('trainer.nav ')])->slot('content');
    }
}
