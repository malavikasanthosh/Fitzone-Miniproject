<?php

namespace App\Http\Livewire\Admin;

use App\Models\MyPackage;
use App\Models\Timeslot;
use Livewire\Component;


class EnrollPackage extends Component
{
    public $trainer_id;
    public $timeslot_id;
    public $myPackage;

    public function mount($id)
    {
        $this->myPackage = MyPackage::findOrFail($id);
    }

    public function store(){
        $this->myPackage->update(['trainer_id'=>$this->trainer_id,'timeslot_id'=>$this->timeslot_id]);
        $this->emit('toast','Updated','','success');
    }

    public function render()
    {
        if(!$this->trainer_id){
            $this->timeslot_id=null;
        }
        return view('livewire.admin.enroll-package')->layout("layouts.app",['nav'=>view('admin.nav')])->slot('content');
    }
}
