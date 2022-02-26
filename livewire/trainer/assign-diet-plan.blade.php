

    <div class="content-wrapper">
        @php

use Illuminate\Support\Carbon;
        @endphp
        <div class="row justify-content-center">

        <div class="col-12 grid-margin stretch-card">
            <div class="card">
            <div class="card-body">
                <h4 class="card-title">{{ $myPackage->member->name}} - {{$myPackage->package->name}}</h4>

            <form class="forms-sample">



               <div class="form-group" wire:ignore>
                <label for="exampleSelectGender">Diet Plan</label>
                  <select wire:key="dfa" wire:model="dietplanId" class="form-control" id="exampleSelectGender">
                    <option value="">Select Plan</option>
                    @foreach (auth()->user()->dietplans as $dietplan )

                    <option value="{{$dietplan->id}} ">{{ $dietplan->name}}</option>

                    @endforeach
                  </select>
                  @if($errors->has('dietplanId'))
                        <span class="text-danger">{{ $errors->first('dietplanId') }}</span>
                    @endif


               </div>

            <button wire:click="store" type="button" class="btn btn-primary mr-2 mt-3">Submit</button>

        </form>
    </div>
</div>
</div>
</div>
</div>

