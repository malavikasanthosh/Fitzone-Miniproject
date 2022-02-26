
<div class="col-lg-12 grid-margin stretch-card">
    @php
        use Illuminate\Support\Carbon;
    @endphp

    <div class="card">
      <div class="card-body">
        <h4 class="card-title"><b>{{$timeslot->name}}</b><small>({{Carbon::parse($timeslot->start_time)->format('g:i A')}} - {{Carbon::parse($timeslot->end_time)->format('g:i A')}})</small> - Members</h4>

        <div class="table-responsive">
          <table class="table table-striped">
            <thead>
              <tr>
                <th>
                  Name
                </th>
                <th>
                  Phone Number
                </th>
                <th>Attendance</th>
                <th>
                  Actions
                </th>
              </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)
              <tr>
                <td>
                 {{ $user->name}}
                </td>
                <td>
                  {{$user->profile->phone}}
                </td>
                @php

                $mypackage = $user->myPackages->where('package_id',auth()->user()->package_id)
                ->where('timeslot_id',$timeslot->id)
                ->where('trainer_id',auth()->id())->first();
                @endphp
                <td>
                    {{$mypackage->attendance->count()}} of {{Carbon::parse($mypackage->created_at)->diffInDaysFiltered(function(Carbon $date) use ($mypackage) {

                        return in_array($date->format('l'),json_decode($mypackage->package?->days??"[]",true));
                    }, Carbon::today())}}
                </td>

                <td>
                    <a href="{{ route('trainer.dietplan.assign',
                    [
                        'id'=>$mypackage->id
                    ])}}" class="btn btn-primary">Assign Diet Plan</a>
                    <a href="{{ route('trainer.vitalinfo',
                    [
                        'id'=>$mypackage->member->id
                    ])}}" class="btn btn-primary">Vital Info</a>
                    @if (in_array(Carbon::today()->format('l'),json_decode($mypackage->package?->days??"[]",true)) && $mypackage->attendance()->whereDate('created_at',Carbon::today())->count()==0)
                        <button class="btn btn-primary" wire:click="attendence({{$mypackage->id}})">Mark Attendence</button>
                    @endif

                </td>
              </tr>
              @endforeach
            </tbody>
          </table>
        </div>
      </div>
    </div>
