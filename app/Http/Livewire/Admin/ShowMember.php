<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;

class ShowMember extends Component
{
    public function render()
    {
        return view('livewire.admin.show-member')->layout("layouts.app",['nav'=>view('admin.nav  ')])->slot('content');
    }
}
