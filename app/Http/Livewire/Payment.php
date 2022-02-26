<?php

namespace App\Http\Livewire;

use App\Models\MyPackage;
use App\Models\Payment as ModelsPayment;
use Livewire\Component;
use Illuminate\Support\Carbon;

class Payment extends Component
{
    public $myPackage;
    public function mount($id)
    {

    $this->myPackage=MyPackage::findOrFail($id);

    }
    public function render()
    {
        return view('livewire.payment')->layout('layouts.blank');
    }
    public function payment()
    {

        if($this->myPackage->payment->count()==0 || Carbon::parse($this->myPackage->payment->last()->created_at)->diffInDays(Carbon::now())>=30){

            ModelsPayment::create([
                'amount'=>$this->myPackage->package->amount,
                'method'=>'online',
                'my_package_id'=>$this->myPackage->id

            ]);
            return redirect()->route('member.mypackage.show');

        }
    }
}
