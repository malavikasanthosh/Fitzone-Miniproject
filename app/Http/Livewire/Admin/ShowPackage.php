<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;

class ShowPackage extends Component
{
    public function render()
    {
        return view('livewire.admin.show-package')->layout("layouts.app",['nav'=>view('admin.nav  ')])->slot('content');
    }
}
