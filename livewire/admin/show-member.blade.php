<div class="col-lg-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">Member Details</h4>

        <div class="table-responsive">
          <table class="table table-striped">
            <thead>
              <tr>
                <th>
                  Name
                </th>
                <th>
                  Gender
                </th>
                <th>
                  Email
              </th>
                <th>
                  Date of Birth
                </th>
                <th>
                  Phone Number

                </th>

                <th>
                  Address
                </th>
                <th>
                    Package
                </th>
              </tr>
            </thead>
            <tbody>
                @foreach (App\Models\User::where('role','member')->get() as $user)


              <tr>

                <td>
                 {{ $user->name}}
                </td>
                <td>
                  {{$user->profile->gender}}
                </td>
                <td>
                  <a href="{{route('admin.notification.user',['id'=>$user->id])}}">{{$user->email}}</a>
                </td>
                <td>
                  {{$user->profile->dob}}
                </td>
                <td>
                  {{$user->profile->phone}}
                </td>

                <td>
                  {{$user->profile->address}}
                </td>
                <td>
                    {{-- implode(', ' ,$user->myPackages()->join('packages','my_packages.package_id','=','packages.id')->select('packages.name')->get()->pluck('name')->toArray( )  ) --}}

                    @foreach($user->myPackages as $mypackage)
                        <a href="{{ route('admin.member.enroll',['id'=>$mypackage->id])}}" class="btn btn-primary">{{$mypackage->package->name}} </a>
                    @endforeach
                </td>
              </tr>
              @endforeach
            </tbody>
          </table>
        </div>
      </div>
    </div>
