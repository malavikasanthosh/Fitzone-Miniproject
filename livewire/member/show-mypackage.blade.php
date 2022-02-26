
<div class="content-wrapper">
    @php
        use Illuminate\Support\Carbon;
    @endphp
    <h2 style="color:rebeccapurple" >My Packages</h2>
    <div class="row justify-content-center">

    @foreach (auth()->user()->myPackages as $myPackage )
            @php
                $package = $myPackage->package;
                $timeslot = $myPackage->timeslot;
                $trainer = $myPackage->trainer;
            @endphp

        <div class="col-12 grid-margin stretch-card">
            <div class="card shadow" style="background-color: rgb(123, 238, 171)">
            <div class="card-body">
                <div class="d-flex">
                   <h4 class="card-title flex-grow">{{$package->name}} ({{ implode(', ' ,json_decode($package->days,true)) }})</h4>
                   <b>Amount: {{ $package->amount }}</b>

                </div>
                <div class="row flex-wrap px-3 pb-2 justify-content-between">
                    @if ($timeslot!=null)
                        <div>Timeslot: {{$timeslot->name}}({{Carbon::parse($timeslot->start_time)->format('g:i A')}} - {{Carbon::parse($timeslot->end_time)->format('g:i A')}})</div>
                    @endif
                    @if ($trainer!=null)
                        <div>
                            Trainer: {{ $trainer->name }}
                        </div>
                    @endif
                    <div>
                        Attendance: {{$myPackage->attendance->count()}} of {{Carbon::parse($myPackage->created_at)->diffInDaysFiltered(function(Carbon $date) use ($myPackage) {

                            return in_array($date->format('l'),json_decode($myPackage->package?->days??"[]",true));
                        }, Carbon::today())}} days
                    </div>
                </div>
                @if($myPackage->payment->count()==0 || Carbon::parse($myPackage->payment->last()->created_at)->diffInDays(Carbon::now())>=30)
                <a href="{{route('member.payment',['id'=>$myPackage->id])}}" class="btn btn-outline-primary btn-sm">
                    Payment
                </a>
                @endif
                </div>
            </div>
        </div>
    @endforeach

    </div>
</div>
