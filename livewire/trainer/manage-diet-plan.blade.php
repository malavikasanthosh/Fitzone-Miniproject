<div class="content-wrapper">
    <h2 style="color:rebeccapurple" >Diet Plan</h2>
    <div class="row justify-content-center">

    @foreach (auth()->user()->dietplans as $dietplan )


        <div class="col-6 grid-margin stretch-card">
            <div class="card shadow" style="background-color: rgb(123, 238, 171)">
            <div class="card-body">
                <div class="d-flex">
                   <h4 class="card-title flex-grow">{{ $dietplan->name }}</h4>
                </div>

                <div class="d-flex">
                    <a href="{{route('trainer.dietplan.upload.update',['id'=>$dietplan->id])}}" class="btn btn-outline-primary btn-sm">
                        Edit
                    </a>
                    <a href="#" wire:click="download({{$dietplan->id}})" class="btn btn-outline-primary btn-sm">
                        Download
                    </a>
                </div>
                </div>
            </div>
        </div>
    @endforeach

    </div>
</div>
