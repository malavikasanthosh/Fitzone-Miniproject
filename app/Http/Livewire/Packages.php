<?php

namespace App\Http\Livewire;

use App\Models\MyPackage;
use Carbon\Carbon;
use Livewire\Component;

class Packages extends Component
{

    public function enroll($packageId){
        MyPackage::create(['package_id'=>$packageId, 'member_id'=>auth()->id()]);
        return redirect()->route('member.mypackage.show');
    }
    public function render()
    {
        return view('livewire.packages')->layout("layouts.guest");
    }

}
