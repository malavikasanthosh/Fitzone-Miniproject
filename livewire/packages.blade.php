<div>


 <!-- Start Banner -->
 <div class="banner-outer inner-banner classes-banner">
    <span class="banner-shadow"></span>
    <div class="container">
        <div class="content" data-aos="fade-down">
            <h1>Packages</h1>
            <div class="breadcrumbs_outer">
                <div class="container">
                    <ul class="breadcrumbs">
                        <li><a href="index-2.html">Home</a></li>
                        <li>Packages</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Banner -->

<!-- Start Feature Classes -->
<div class="feature-outer classes-page">
    <div class="container">
        <div class="feature-list">
            <div class="row">
                @foreach (App\Models\Package::all() as $package )

                <div class="col-sm-4 col-xs-12">
                    <div class="feature-box">
                        <figure style="height: 50px" class="m-0">
                            <div class="time-box">
                                <span class="date"><span>Price</span></span>
                                <span class="time"><span>{{ $package->amount}}</span></span>
                            </div>
                        </figure>
                        <h4>{{$package->name}}</h4>
                        <p>{{$package->description}}</p>
                        @if (auth()->check() && auth()->user()->role=='member' &&  auth()->user()->myPackages->where('package_id',$package->id)->count()==0)
                            <button wire:click="enroll({{$package->id}})" class="btn btn-sm position-absolute" style="top: 0px;right: 0px;">Join    </button>
                        @endif

                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
<!-- End Feature sec -->

</div>
