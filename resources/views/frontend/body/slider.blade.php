@php
    $banners=App\Models\Banner::all();
@endphp

<div class="slider">
		<div class="all-slide owl-item">	
			<!-- Slider Single Item Start -->
            @foreach ($banners as $banner)
			<div class="single-slide" >
                <img src="{{asset($banner->banner_image)}}" alt="">
				<div class="slider-overlay">
                    <div class="slider-wrapper">
					<div class="slider-text">
						<div class="slider-caption">
							<h1>{{$banner->banner_title}}</h1>	
							<ul>
								<li><a href="#">learn more</a></li>					
								<li><a href="#">contact us</a></li>
							</ul>							
						</div>	
					</div>
				</div>
            </div>
				
			</div>
            @endforeach
			
		</div> 
    </div>