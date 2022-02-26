<?php

namespace App\Http\Livewire\Trainer;

use App\Models\User;
use App\Models\VitalInfo as ModelsVitalInfo;
use Livewire\Component;

class Vitalinfo extends Component
{
    public $weight;
    public $height;
    public $user;

    public function mount($id)
    {
        $this->user=User::findOrFail($id);
        $this->weight = "";
        $this->height = "";
    }
    public function store()
    {
        $this->validate([

            'weight'=>['required','numeric'],
            'height'=>['required','numeric']
        ]);

        ModelsVitalInfo::create(['weight'=>$this->weight,'height'=>$this->height,'user_id'=>$this->user->id]);
        $this->emit('toast','Vital Info updated','','success');
    }
    public function render()
    {
        return view('livewire.trainer.vitalinfo')->layout("layouts.app",['nav'=>view('trainer.nav')])->slot('content');
    }

}
