@extends('layouts.frontend')

@section('page-title')
			<section class="banner-area-private relative" id="home">	
				<div class="overlay overlay-bg"></div>
				<div class="container">				
					<div class="row d-flex align-items-center justify-content-center">
						<div class="about-content col-lg-12">
							<h1 class="text-white">
								一般領養			
							</h1>	
							<!-- <p class="text-white link-nav"><a href="index.html">Home </a>  <span class="lnr lnr-arrow-right"></span>  <a href="dogs.html"> dogs</a></p> -->
						</div>	
					</div>
				</div>
			</section>
@endsection

@section('content')
    		<section class="cat-list-area section-gap">
				<div class="container">
					<div class="row">
						<div class="col-md-10 mb-30">
							<div class="single-element-widget ">
								<form action="/normalpets">
								<div class="default-select inline-flex mr-30 mb-15" id="default-select">
									<select id='area' name='area'>
										<option value="0">不限地區</option>
										<option value="N"@if(isset($params['area'])&&$params['area']=='N') selected @endif>北部地區</option>
										<option value="C"@if(isset($params['area'])&&$params['area']=='C') selected @endif>中部地區</option>
										<option value="S"@if(isset($params['area'])&&$params['area']=='S') selected @endif>南部地區</option>
										<option value="E"@if(isset($params['area'])&&$params['area']=='E') selected @endif>東部地區</option>
									</select>
								</div>
								<div class="default-select inline-flex mr-30" id="default-select">
									<select id='animal_sex' name='animal_sex'>
										<option value="0">不限性別</option>
										<option value="公"@if(isset($params['animal_sex'])&&$params['animal_sex'] == '公') selected @endif>公</option>
										<option value="母"@if(isset($params['animal_sex'])&&$params['animal_sex'] == '母') selected @endif>母</option>
									</select>
								</div>
								<div class="default-select inline-flex mr-30" id="default-select">
									<select name = "animal_type">
										<option value="0">不限種類</option>
										<option value="狗"@if(isset($params['animal_type']) && $params['animal_type'] == '狗') selected @endif>狗</option>
										<option value="貓"@if(isset($params['animal_type']) && $params['animal_type'] == '貓') selected @endif>貓</option>
									</select>
								</div>
								<input type="submit" class="genric-btn success radius" value="搜尋">
								</form>
							</div>
						</div>
						<div class="col-md-2 mb-30 d-flex justify-content-end ">
								<a href="/normalpets/create"><input type="submit" class="genric-btn success radius" value="刊登領養"></a>
							
						</div>
						@foreach ($pets as $key => $pet)
							<div class="col-md-6">
								<div class="row no-gutters border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
									<div class="col p-4 d-flex flex-column position-static">
										<h3 class="mb-2">{{ $pet->animal_name }} @if($pet->normalpet->status ==1)<span class="badge badge-success ml-2">@else<span class="badge badge-warning ml-2">@endif{{ $pet->normalpet->status ==1? "已領養" : "未領養" }}</span></h3>
									<div class="mb-1 text-muted"><i class="fa fa-address-card mr-3" aria-hidden="true"></i>{{ $pet->animal_type }}</div>
										<div class="mb-1 text-muted"><i class="fa fa fa-venus-mars mr-3" aria-hidden="true"></i>{{ $pet->animal_sex }}</div>										
										<div class="mb-1 text-muted"><i class="fa fa-paw mr-2" aria-hidden="true"></i>{{ $pet->animal_size }}{{ $pet->animal_age }}{{ $pet->animal_breed }}</div>
										<div class="mb-1 text-muted"><i class="fa fa-map-marker mr-3" aria-hidden="true"></i>{{ $pet->animal_place }}</div>
										<p class="card-text mb-auto mt-2 ellipsis">{{ str_limit($pet->animal_description, 20) }}</p>
										<a href="/normalpets/show/{{ $pet->normalpet->normal_pet_id }}" class="genric-btn success small mt-3">詳細資料</a>
						
										
									</div>
									<div class=" col-md-6">
										<div class="single-cat-list mb-0">
											<img style="object-fit:cover;" src="{{ $pet->animal_img }}" alt="" class="img-fluid">
										</div>
									</div>
								</div>
							</div>
						@endforeach
							<div class="blog-pagination justify-content-center d-flex col-md-12">
								{{$pets->appends(request()->all())->links()}}
							</div>
						
                    </div>
            </section>
@endsection