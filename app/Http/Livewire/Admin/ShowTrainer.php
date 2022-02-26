<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;

class ShowTrainer extends Component
{
    public function render()
    {
        return view('livewire.admin.show-trainer')->layout("layouts.app",['nav'=>view('admin.nav  ')])->slot('content');
    }
}
