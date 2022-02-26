<?php

namespace App\Http\Livewire\Member;

use Livewire\Component;

class Dietplan extends Component
{
    public function render()
    {
        return view('livewire.member.dietplan')->layout("layouts.app",['nav'=>view('member.nav  ')])->slot('content');
    }
}
