
<div class="content-wrapper">
    <div class="row justify-content-center">

<div class="content-wrapper">
    <div class="row justify-content-center">

      <div class="col-12 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
            <h4 class="card-title"> Upload Diet Plans</h4>

            <form class="forms-sample">
              <div class="form-group">
                <label for="exampleInputphone">Name</label>

             <input  wire:model="name" type="text" class="form-control" id="exampleInputname" placeholder="Name">
             @if($errors->has('name'))
                        <span class="text-danger">{{ $errors->first('name') }}</span>
                    @endif
            </div>

                <div class="form-group">
                    <label for="exampleInputPassword1">File</label>
                    <input wire:model="file" type="file" class="form-control" id="exampleInputPassword1">
                        @if($errors->has('file'))
                            <span class="text-danger">{{ $errors->first('file') }}</span>
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
