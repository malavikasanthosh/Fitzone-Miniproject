<div class="content-wrapper">
    <div class="row justify-content-center">

<div class="content-wrapper">
    <div class="row justify-content-center">

      <div class="col-12 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
            <h4 class="card-title">Profile</h4>

            <form class="forms-sample">
              <div class="form-group">
                <label for="exampleInputphone">Name</label>

             <input  wire:model="name" type="text" class="form-control" id="exampleInputname" placeholder="Name">
             @if($errors->has('name'))
                        <span class="text-danger">{{ $errors->first('name') }}</span>
                    @endif
            </div>
              <div class="form-group">
                <label for="exampleSelectGender">Gender</label>
                  <select wire:model="gender" class="form-control" id="exampleSelectGender">
                    <option value=""></option>
                    <option value="Male">Male</option>
                    <option value="Female">Female</option>

                  </select>
                  @if($errors->has('gender'))
                        <span class="text-danger">{{ $errors->first('gender') }}</span>
                    @endif
                  <div class="form-group">
                    <label for="exampleInputphone">Phone Number</label>
                    <input  wire:model="phone"type="text" class="form-control" id="exampleInputphone" placeholder="Phone Number">
                    @if($errors->has('phone'))
                    <span class="text-danger">{{ $errors->first('phone') }}</span>
                @endif
                </div>

                  <div class="form-group">
                    <label class="">Date of Birth</label>
                    <input  wire:model="dob" type="date" class="form-control" placeholder="dd/mm/yyyy"/>
                    @if($errors->has('dob'))
                    <span class="text-danger">{{ $errors->first('dob') }}</span>
                @endif
                </div>

                </div>
                <div class="form-group">
                  <label for="exampleTextarea1">Address</label>
                  <textarea  wire:model="address"class="form-control" id="exampleTextarea1" rows="4"></textarea>
                  @if($errors->has('address'))
                  <span class="text-danger">{{ $errors->first('address') }}</span>
              @endif
                </div>

                <button wire:click="store" type="button" class="btn btn-primary mr-2">Submit</button>

            </form>
          </div>
        </div>
      </div>


          {{-- <div class="col-md-6 grid-margin stretch-card">
            <div class="card">
              <div class="card-body">
                <h4 class="card-title"> Trainer Details</h4>

                <form class="forms-sample">
                  <div class="form-group">
                    <label for="exampleInputUsername1">Address</label>
                    <textarea wire:model="address" rows="2" cols="2" class="form-control" id="exampleInputUsername1" placeholder="Address"></textarea>
                    @if($errors->has('address'))
                        <span class="text-danger">{{ $errors->first('address') }}</span>
                    @endif
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Gender</label>
                    <input wire:model="email" type="radio" class="form-control" id="exampleInputEmail1" placeholder="Email">
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

                  <button wire:click="store" type="button" class="btn btn-primary mr-2">Submit</button>

                  <button wire:click="resetInput" class="btn btn-light">Cancel</button>

                </form>
              </div>
            </div>
          </div> --}}
    </div>
</div>



    </div>
</div>
