<?php

namespace App\Http\Livewire\Trainer;

use App\Models\DietPlan;
use Livewire\Component;
use Livewire\WithFileUploads;
class UploadDietPlan extends Component
{
    use WithFileUploads;

    public $file;
    public $name;
    public $dietplanId;

    public function mount($id=null){
        $dietplan = DietPlan::find($id);
        $this->name = $dietplan?->name??"";
        $this->dietplanId = $id;
    }

    public function store()
    {
        $this->validate([
            'name' => "required",
            'file' => 'file|mimes:pdf|max:5120', // 5MB Max
        ]);

        $filename = $this->file->store('dietplans');
        DietPlan::updateOrCreate(['id'=>$this->dietplanId],['name'=>$this->name,'plan'=>$filename,'user_id'=>auth()->id()]);
        $this->emit('toast','Diet Plan Created','','success');
        if($this->dietplanId==null)
        {$this->name = null;}
        $this->file = null;

    }
    public function render()
    {
        return view('livewire.trainer.upload-diet-plan')->layout("layouts.app",['nav'=>view('trainer.nav  ')])->slot('content');
    }
}
