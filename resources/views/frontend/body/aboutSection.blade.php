<div class="service-cat-sec pt-100">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="sec-title text-center">
                    <h1>WHAT WE ARE ABOUT</h1>
                    <p>CARNIVAL OFFSET PRINTERS is the Trims and Accessories Manufacturer in Bangladesh that is defined by three things – innovative operational skills, expertise in professionalism and advanced technology.</p>
                </div>				
            </div>
        </div>	
    </div>
    <div class="container">
        <div class="row">

            @php
                 $abouts = App\Models\WhatWeAreAbout::latest()->take(3)->get();
            @endphp

            @foreach ($abouts as $about)
            <div class="col-md-4">
                <div class="single-service-cat">
                    <div class="service-cat-img">
                        <img src="{{asset($about->image)}}" alt="">
                        <a href="#" class="service-cat-btn">Read More</a>						
                    </div>
                    <div class="service-cat-desc">
                        <span class="service-cat-icon"><i class="icofont-recycle-alt"></i></span>
                        <div class="service-cat-title">
                            <h2><a href="#">{{$about->title}}</a></h2>	
                        </div>
                        <p>{{$about->description}}</p>
                        <a href="#" class="service-cat-redmore">View Details <i class="icofont-thin-right"></i></a>
                    </div>
                </div>
            </div>
            @endforeach

        </div>
    </div>
</div>