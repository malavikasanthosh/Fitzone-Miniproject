
<div class="content-wrapper">
    @php
        use Illuminate\Support\Carbon;
    @endphp
    <h2 style="color:rebeccapurple" >Packages</h2>
    <div class="row justify-content-center">

    @foreach (App\Models\Package::all() as $package )


        <div class="col-12 grid-margin stretch-card">
            <div class="card shadow" style="background-color: rgb(123, 238, 171)">
            <div class="card-body">
                <div class="d-flex">
                   <h4 class="card-title flex-grow">{{$package->name}} ({{ implode(', ' ,json_decode($package->days,true)) }})</h4>
                   <b>Amount: {{ $package->amount }}</b>

                </div>
                <div class="row flex-wrap px-3 pb-2">
                    @foreach ($package->timeslots as $timeslot )
                        <a class="mr-2" href="{{route('admin.timeslot.update',['id'=>$timeslot->id])}}">
                        </a>
                    @endforeach
                </div>

                <p>{{$package->description}}

                </p>
                <a href="{{ route('admin.package.update',['id'=>$package->id])}}" class="btn btn-outline-primary btn-sm">
                    Edit
                    </a>
                </div>
            </div>
        </div>
    @endforeach

    </div>
</div>
