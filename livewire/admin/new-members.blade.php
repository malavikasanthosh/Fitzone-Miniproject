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
                  Package
                </th>

                <th>
                  Phone Number

                </th>
                <th>
                    Action
                </th>

              </tr>
            </thead>
            <tbody>
                @foreach (App\Models\User::where('role','member')
                ->leftJoin('profiles','users.id', '=', 'profiles.user_id')
                ->joinSub(App\Models\MyPackage::where('trainer_id',null)->where('timeslot_id')->has('payment','=',1),'my_packages', 'users.id', '=', 'my_packages.member_id')
                ->leftJoin('packages','packages.id','my_packages.package_id')
                ->select('users.name','packages.name as packageName','profiles.phone','my_packages.id as myPackageId')
                ->get() as $user)
              <tr>

                <td>
                 {{ $user->name}}
                </td>

                <td>
                    {{$user->packageName}}
                </td>

                <td>
                  {{$user?->phone}}
                </td>
                <td>
                    <a href="{{ route('admin.member.enroll',['id'=>$user->myPackageId])}}" class="btn btn-primary">Approve</a>
                </td>

              </tr>
              @endforeach
            </tbody>
          </table>
        </div>
      </div>
    </div>
