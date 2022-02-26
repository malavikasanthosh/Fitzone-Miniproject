

    <div class="content-wrapper">
        <div class="row justify-content-center">

        <div class="col-12 grid-margin stretch-card">
            <div class="card">
            <div class="card-body">
                <h4 class="card-title">Package</h4>

            <form class="forms-sample">
              <div class="form-group">
                <label for="exampleInputphone">Name</label>
                <input  wire:model="name" type="text" class="form-control" id="exampleInputname" placeholder="Name">
                @if($errors->has('name'))
                           <span class="text-danger">{{ $errors->first('name') }}</span>
                       @endif
               </div>
               <div class="form-group">
                <label for="exampleTextarea1">Description</label>
                <textarea  wire:model="description"class="form-control" id="exampleTextarea1" rows="4"></textarea>
                @if($errors->has('description'))
                <span class="text-danger">{{ $errors->first('description') }}</span>
            @endif
              </div>
              <div class="form-group">
                <label for="exampleInputphone">Amount</label>
                <input  wire:model="amount"type="number" class="form-control" id="exampleInputphone" placeholder="Amount">
                @if($errors->has('amount'))
                <span class="text-danger">{{ $errors->first('amount') }}</span>
            @endif
            </div>

            <div class="form-group m-0">
                <label>Select Days</label>
            </div>
            <div class="form-group row" wire:ignore>


                <div class="form-check form-check-danger ml-4">
                  <label class="form-check-label">
                    <input wire:click="toggleDay('Sunday');" type="checkbox" class="form-check-input"  @if (in_array('Sunday',$days  )) checked @endif>
                    Sunday
                  </label>
                </div>
                <div class="form-check form-check-success ml-4">
                  <label class="form-check-label">
                    <input wire:click="toggleDay('Monday');"  type="checkbox" class="form-check-input"  @if (in_array('Monday',$days  )) checked @endif>
                    Monday
                  </label>
                </div>
                <div class="form-check form-check-secondary ml-4">
                    <label class="form-check-label">
                      <input wire:click="toggleDay('Tuesday');"  type="checkbox" class="form-check-input"  @if (in_array('Tuesday',$days  )) checked @endif>
                      Tuesday
                    </label>
                </div>
                <div class="form-check form-check-primary ml-4">
                  <label class="form-check-label">
                    <input wire:click="toggleDay('Wednesday');"type="checkbox" class="form-check-input" @if (in_array('Wednesday',$days  )) checked @endif>
                    Wednesday
                  </label>
                </div>
                <div class="form-check form-check-warning ml-4">
                  <label class="form-check-label">
                    <input wire:click="toggleDay('Thursday');"type="checkbox" class="form-check-input"  @if (in_array('Thursday',$days  )) checked @endif>
                    Thursday
                  </label>
                </div>
                <div class="form-check form-check-success ml-4">
                    <label class="form-check-label">
                      <input  wire:click="toggleDay('Friday');"type="checkbox" class="form-check-input"  @if (in_array('Friday',$days  )) checked @endif>
                      Friday
                    </label>
                  </div>
                  <div class="form-check form-check-danger ml-4">
                    <label class="form-check-label">
                      <input wire:click="toggleDay('Saturday');"type="checkbox" class="form-check-input"  @if (in_array('Saturday',$days  )) checked @endif>
                      Saturday
                    </label>
                  </div>
              </div>

            <button wire:click="store" type="button" class="btn btn-primary mr-2">Submit</button>

        </form>
    </div>
</div>
</div>
</div>
</div>
