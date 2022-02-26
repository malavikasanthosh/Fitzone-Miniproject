<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;

class NewMembers extends Component
{
    public function render()
    {
      return view('livewire.admin.new-members')->layout("layouts.app",['nav'=>view('admin.nav')])->slot('content');
    }
}
