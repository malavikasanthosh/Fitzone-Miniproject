<?php

namespace App\Http\Livewire\Trainer;

use App\Models\DietPlan;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;

class ManageDietPlan extends Component
{
    public function render()
    {
        return view('livewire.trainer.manage-diet-plan')->layout("layouts.app",['nav'=>view('trainer.nav ')])->slot('content');
    }

    public function download($id){
        $dietplan=DietPlan::find($id);
        return Storage::download($dietplan->plan);

    }
}
