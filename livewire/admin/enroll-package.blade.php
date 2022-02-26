

    <div class="content-wrapper">
        @php

use Illuminate\Support\Carbon;
        @endphp
        <div class="row justify-content-center">

        <div class="col-12 grid-margin stretch-card">
            <div class="card">
            <div class="card-body">
                <h4 class="card-title">{{ $myPackage->member?->name}} - {{$myPackage->package?->name}}</h4>

            <form class="forms-sample">



               <div class="form-group" wire:ignore>
                <label for="exampleSelectGender">Trainer</label>
                  <select wire:key="dfa" wire:model="trainer_id" class="form-control" id="exampleSelectGender">
                    <option value="">Select Trainer</option>
                    @foreach ($myPackage->package->trainers as $trainer )

                    <option value="{{$trainer->id}} ">{{ $trainer->name}}</option>

                    @endforeach
                  </select>
                  @if($errors->has('trainer_id'))
                        <span class="text-danger">{{ $errors->first('trainer_id') }}</span>
                    @endif


               </div>
               @if ($trainer_id)


               <div class="form-group" >
                <label for="exampleSelectGender">Timeslot</label>
                  <select wire:model="timeslot_id" class="form-control" id="exampleSelectGender">
                    <option value="">Select Timeslot</option>
                    @foreach ($myPackage->package->timeslots as $timeslot)
                    @if (App\Models\MyPackage::where('package_id',$myPackage->package_id)->where('timeslot_id',$myPackage->timeslot_id)->where('trainer_id',$trainer_id)->count()<=20)

                        <option value="{{$timeslot->id}} ">{{$timeslot->name}}({{Carbon::parse($timeslot->start_time)->format('g:i A')}} - {{Carbon::parse($timeslot->end_time)->format('g:i A')}})</option>

                    @endif


                    @endforeach
                  </select>
                  @if($errors->has('timeslot_id'))
                        <span class="text-danger">{{ $errors->first('timeslot_id') }}</span>
                    @endif


               </div>

            @endif
            <button wire:click="store" type="button" class="btn btn-primary mr-2 mt-3">Submit</button>

        </form>
    </div>
</div>
</div>
</div>
</div>

