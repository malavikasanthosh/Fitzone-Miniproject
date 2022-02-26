<?php

namespace App\Http\Livewire\Member;

use Livewire\Component;
use Carbon\Carbon;
use App\Models\MyPackage;
use App\Models\Payment;

class ShowMypackage extends Component
{
    public function render()
    {
        return view('livewire.member.show-mypackage')->layout("layouts.app",['nav'=>view('member.nav  ')])->slot('content');
    }


}
