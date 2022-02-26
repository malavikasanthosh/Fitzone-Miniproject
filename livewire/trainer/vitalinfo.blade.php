
<div class="content-wrapper">
    <div class="row justify-content-center">

<div class="content-wrapper">
    <div class="row justify-content-center">

      <div class="col-12 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
            <h4 class="card-title">Vital Information</h4>

            <form class="forms-sample">
              <div class="form-group">
                <label for="exampleInputphone">Weight</label>

             <input  wire:model="weight" type="text" class="form-control" id="exampleInputname" placeholder="Weight">
             @if($errors->has('weight'))
                        <span class="text-danger">{{ $errors->first('weight') }}</span>
                    @endif
            </div>

                <div class="form-group">
                    <label for="exampleInputPassword1">Height</label>
                    <input wire:model="height" type="text" class="form-control" id="exampleInputPassword1">
                        @if($errors->has('height'))
                            <span class="text-danger">{{ $errors->first('height') }}</span>
                        @endif
                  </div>
                <button wire:click="store" type="button" class="btn btn-primary mr-2">Submit</button>
            </form>
          </div>
        </div>
      </div>



    </div>
</div>



    </div>
</div>
