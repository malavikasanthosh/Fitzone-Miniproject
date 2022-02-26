
<div class="content-wrapper">
    @php
        use Illuminate\Support\Carbon;
    @endphp
    <h2 style="color:rebeccapurple" >My Packages</h2>
    <div class="row justify-content-center">
@php
    $dietplan= auth()->user()->dietplan;

@endphp

        @if ($dietplan)


        <div class="col-12 grid-margin stretch-card">
            <div class="card shadow" style="background-color: rgb(123, 238, 171)">
            <div class="card-body">
                <div class="d-flex">
                   <h4 class="card-title flex-grow">{{$dietplan->name}}</h4>

                </div>

                <a href="#" wire:click="download({{$dietplan->id}})" class="btn btn-primary">
                    Download Plan
                </a>
                </div>
            </div>
        </div>
        @else
        <div class="col-12 grid-margin stretch-card">
            <div class="card shadow" style="background-color: rgb(123, 238, 171)">
            <div class="card-body">
                <div class="d-flex justify-content-center">
                   <h6 class="card-title flex-grow">Diet Plan not set</h6>

                </div>


            </div>
        </div>
        @endif

    </div>
</div>
