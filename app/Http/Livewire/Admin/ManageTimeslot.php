<?php

namespace App\Http\Livewire\Admin;

use App\Models\Timeslot;
use Carbon\Carbon;
use Livewire\Component;

class ManageTimeslot extends Component
{
    public $name;
    public $start_time;
    public $end_time;
    public $package_id;
    public $timeslotId;

    public function mount($id=null){
        $this->timeslotId=$id;

        $timeslot = Timeslot::find($id);

        $this->name = $timeslot?->name??"";
        $this->start_time=$timeslot?->start_time==null?null:Carbon::parse($timeslot?->start_time)->format('H:i');
        $this->end_time=$timeslot?->end_time==null?null:Carbon::parse($timeslot?->end_time)->format('H:i');
        $this->package_id=$timeslot?->package_id;
    }

    public function store()
    {


        $this->validate([
            'name' => ['required', 'string', 'max:255'],
            'start_time'=>['required','date_format:H:i'],
            'end_time'=>['required','date_format:H:i'],
            'package_id' =>['required','exists:packages,id']
        ]);

        Timeslot::updateOrCreate(["id"=>$this->timeslotId],[
            'name'=> $this->name,
            'start_time'=>$this->start_time,
            'end_time'=>$this->end_time,
            'package_id'=>$this->package_id

        ]);

        $this->emit('toast','Timeslot '.($this->id==null?'Added':'Updated'),'','success');

    }

    public function render()
    {
        return view('livewire.admin.manage-timeslot')->layout("layouts.app",['nav'=>view('admin.nav  ')])->slot('content');
    }
}
