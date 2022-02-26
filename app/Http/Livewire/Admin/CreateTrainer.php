<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use Illuminate\Validation\Rules;
    use App\Models\User;
use Illuminate\Support\Facades\Hash;

class CreateTrainer extends Component
{

    public $name;
    public $email;
    public $password;
    public $packageid;

    public function mount(){
        $this->name = "";
        $this->email = "";
        $this->password = "";
        $this->packageid=null;
    }
    public function resetInput()
    {
        $this->name = "";
        $this->email = "";
        $this->password = "";
        $this->packageid=null;
    }

    public function store()
    {

        $this->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => [Rules\Password::defaults()],
            'packageid'=>['required','exists:packages,id']

        ]);

        $user = User::create([
            'name' => $this->name,
            'email' => $this->email,
            'password' => Hash::make($this->password),
            'role' => 'trainer',
            'package_id'=>$this->packageid

        ]);
        $this->emit('toast','Trainer Added','','success');
        $this->resetInput();


    }


    public function render()
    {
        return view('livewire.admin.create-trainer')->layout("layouts.app",['nav'=>view('admin.nav  ')])->slot('content');
    }
}
