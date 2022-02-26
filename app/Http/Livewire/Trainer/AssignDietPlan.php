<?php

namespace App\Http\Livewire\Trainer;

use App\Models\MyPackage;
use Livewire\Component;

class AssignDietPlan extends Component
{
    public $myPackage;
    public $dietplanId;
    public function mount($id){
        $this->myPackage =MyPackage::findOrFail($id);
    }
    public function store(){
        $this->validate(['dietplanId'=>'required']);
        $this->myPackage->member->update(['diet_plan_id'=>$this->dietplanId]);
        $this->emit('toast','Updated','','success');
    }
    public function render()
    {
        return view('livewire.trainer.assign-diet-plan')->layout("layouts.app",['nav'=>view('trainer.nav ')])->slot('content');
    }
}
