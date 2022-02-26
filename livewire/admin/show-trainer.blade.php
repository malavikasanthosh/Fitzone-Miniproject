 <div class="col-lg-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Trainer Details</h4>

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
                            Aadhar Number
                          </th>
                          <th>
                            Address
                          </th>

                        </tr>
                      </thead>
                      <tbody>
                          @foreach (App\Models\User::where('role','trainer')->get() as $user)


                        <tr>

                          <td>
                           {{ $user->name}}
                          </td>
                          <td>
                              {{$user->package->name}}
                          </td>
                          <td>
                            {{$user->profile?->gender}}
                          </td>
                          <td>
                            <a href="{{route('admin.notification.user',['id'=>$user->id])}}">{{$user->email}}</a>
                          </td>
                          <td>
                            {{$user->profile?->dob}}
                          </td>
                          <td>
                            {{$user->profile?->phone}}
                          </td>
                          <td>
                            {{$user->profile?->aadhar}}
                          </td>
                          <td>
                            {{$user->profile?->address}}
                          </td>
                        </tr>
                        @endforeach
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
