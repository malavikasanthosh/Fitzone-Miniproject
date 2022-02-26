<div class="content-wrapper">
    <div class="row justify-content-center">
        <div class="col-md-6 grid-margin stretch-card">
            <div class="card">
              <div class="card-body">
                <h4 class="card-title">Create Trainer</h4>

                <form class="forms-sample">
                  <div class="form-group">
                    <label for="exampleInputUsername1">Name</label>
                    <input wire:model="name" type="text" class="form-control" id="exampleInputUsername1" placeholder="Name">
                    @if($errors->has('name'))
                        <span class="text-danger">{{ $errors->first('name') }}</span>
                    @endif
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Email address</label>
                    <input wire:model="email" type="email" class="form-control" id="exampleInputEmail1" placeholder="Email">
                    @if($errors->has('email'))
                        <span class="text-danger">{{ $errors->first('email') }}</span>
                    @endif
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Password</label>
                    <input wire:model="password" type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
                        @if($errors->has('password'))
                            <span class="text-danger">{{ $errors->first('password') }}</span>
                        @endif
                  </div>

                  {{-- <div class="form-group">
                    <label for="exampleInputConfirmPassword1">Confirm Password</label>
                    <input type="password" class="form-control" id="exampleInputConfirmPassword1" placeholder="Password">
                  </div> --}}
                  <div class="form-group mb-2" >
                    <label for="exampleSelectGender">Package</label>
                      <select wire:model="packageid" class="form-control" id="exampleSelectGender">
                        <option value="">Select Package</option>
                        @foreach (App\Models\Package::all() as $package )

                        <option value="{{$package->id}} ">{{ $package->name}}</option>

                        @endforeach
                      </select>
                      @if($errors->has('packageid'))
                            <span class="text-danger">{{ $errors->first('packageid') }}</span>


                    @endif
                  </div>
                  <button wire:click="store" type="button" class="btn btn-primary mr-2">Submit</button>

                  <button wire:click="resetInput" class="btn btn-light">Cancel</button>

                </form>
              </div>
            </div>
          </div>
    </div>
</div>
