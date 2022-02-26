
<div class="content-wrapper">
    <div class="row justify-content-center">

<div class="content-wrapper">
    <div class="row justify-content-center">

      <div class="col-12 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
            <h4 class="card-title">Notification</h4>
            <h6 class="pb-2">To: @if(count($emails)==1) {{$emails[0]}} @else All @endif </h6>

            <form class="forms-sample">
              <div class="form-group">
                <label for="exampleInputphone">Title</label>

             <input  wire:model="title" type="text" class="form-control" id="exampleInputname" placeholder="Title">
             @if($errors->has('title'))
                        <span class="text-danger">{{ $errors->first('title') }}</span>
                    @endif
            </div>

                <div class="form-group">
                    <label for="exampleInputPassword1">Description</label>
                    <input wire:model="description" type="text" class="form-control" id="exampleInputPassword1" placeholder="Description">
                        @if($errors->has('description'))
                            <span class="text-danger">{{ $errors->first('description') }}</span>
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
