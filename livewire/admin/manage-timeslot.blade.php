

    <div class="content-wrapper">
        <div class="row justify-content-center">

        <div class="col-12 grid-margin stretch-card">
            <div class="card">
            <div class="card-body">
                <h4 class="card-title">Timeslot</h4>

            <form class="forms-sample">
              <div class="form-group">
                <label for="exampleInputphone">Session Name</label>
                <input  wire:model="name" type="text" class="form-control" id="exampleInputname" placeholder="Name">
                @if($errors->has('name'))
                           <span class="text-danger">{{ $errors->first('name') }}</span>
                       @endif
               </div>
               <div class="form-group">
                <label for="exampleInputphone">Starting Time</label>
                <input  wire:model="start_time" type="time" class="form-control" id="exampleInputname" placeholder="Starting Time">
                @if($errors->has('start_time'))
                           <span class="text-danger">{{ $errors->first('start_time') }}</span>
                       @endif
               </div>

               <div class="form-group">
                <label for="exampleInputphone">Ending Time</label>
                <input  wire:model="end_time" type="time" class="form-control" id="exampleInputname" placeholder="Ending Time">
                @if($errors->has('end_time'))
                           <span class="text-danger">{{ $errors->first('end_time') }}</span>
                       @endif
               </div>
               @if ($timeslotId ==null)


               <div class="form-group" >
                <label for="exampleSelectGender">Package</label>
                  <select wire:model="package_id" class="form-control" id="exampleSelectGender">
                    <option value="">Select Package</option>
                    @foreach (App\Models\Package::all() as $package )

                    <option value="{{$package->id}} ">{{ $package->name}}</option>

                    @endforeach
                  </select>
                  @if($errors->has('package_id'))
                        <span class="text-danger">{{ $errors->first('package_id') }}</span>
                    @endif

                @endif
            <button wire:click="store" type="button" class="btn btn-primary mr-2 mt-3">Submit</button>

        </form>
    </div>
</div>
</div>
</div>
</div>
