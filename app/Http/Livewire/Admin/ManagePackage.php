<?php

namespace App\Http\Livewire\Admin;

use App\Models\Package;
use Livewire\Component;

class ManagePackage extends Component
{
    public $packageId;
    public $name;
    public $description;
    public $amount;
    public $days;
    static $_days   =['Sunday','Monday','Tuesday','Wednesday','Thursday','Friday','Saturday'];

    public function mount($id=null){
        $this->packageId=$id;

        $package = Package::find($id);

        $this->name = $package?->name??"";
        $this->description=$package?->description??"";
        $this->amount=$package?->amount??"";
        $this->days=json_decode($package?->days??"[]",true)??[];

    }
    public function store()
    {

        $this->validate([
            'name' => ['required', 'string', 'max:255'],
            'description'=>['required','string'],
            'amount'=>['required','numeric'],
            'days'=>['required','array']


        ]);



        Package::updateOrCreate(["id"=>$this->packageId],[
            'name'=> $this->name,
            'description'=>$this->description,
            'amount'=>$this->amount,
            'days'=>json_encode($this->days)

        ]);

        $this->emit('toast','Package '.($this->id==null?'Added':'Updated'),'','success');


    }

    public function toggleDay($value)
    {
        if(in_array($value, $this->days)){
            $this->days = array_diff($this->days, [$value]);
        }else if(in_array($value, ManagePackage::$_days)){
           array_push( $this->days,$value);

        }
    }

    public function render()
    {
        return view('livewire.admin.manage-package')->layout("layouts.app",['nav'=>view('admin.nav  ')])->slot('content');

    }
}
