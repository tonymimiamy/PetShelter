@extends('layouts.frontend')

@section('page-title')
			<section class="banner-area-pubic relative" id="home">	
				<div class="overlay overlay-bg"></div>
				<div class="container">				
					<div class="row d-flex align-items-center justify-content-center">
						<div class="about-content col-lg-12">
							<h1 class="text-white">
								公立領養				
							</h1>	
							<!-- <p class="text-white link-nav"><a href="index.html">Home </a>  <span class="lnr lnr-arrow-right"></span>  <a href="cats.html"> Cats</a></p> -->
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
							<form action="/publicpets" method="get">
								@csrf
								<div class="default-select inline-flex mr-30 mb-15" id="default-select">
									<select id="shelter_id" name="shelter_id">
										<option value="0">不限收容所</option>
									@foreach ($shelters as $key => $shelter)
										<option value="{{ $shelter->shelter_id }}" @if(isset($params['shelter_id']) && $params['shelter_id'] == $shelter->shelter_id) selected @endif>
											{{ $shelter->shelter_name }}
										</option>
									@endforeach
									</select>
								</div>
								<div class="default-select inline-flex mr-30" id="default-select">
									<select name = "animal_sex">
										<option value="0">不限性別</option>
										<option value="公"@if(isset($params['animal_sex']) && $params['animal_sex'] == '公') selected @endif>公</option>
										<option value="母"@if(isset($params['animal_sex']) && $params['animal_sex'] == '母') selected @endif>母</option>
									</select>
								</div>
								<div class="default-select inline-flex mr-30" id="default-select">
									<select name = "animal_type">
										<option value="0">不限種類</option>
										<option value="狗"@if(isset($params['animal_type']) && $params['animal_type'] == '狗') selected @endif>狗</option>
										<option value="貓"@if(isset($params['animal_type']) && $params['animal_type'] == '貓') selected @endif>貓</option>
									</select>
								</div>
								
								<input type="submit" class="genric-btn primary radius" value="搜尋">
								</form>
							</div>
						</div>
						@foreach ($pets as $key => $pet)
							<div class="col-md-6">
								<div class="row no-gutters border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
									<div class="col p-4 d-flex flex-column position-static">
										<h4 class="mb-2">{{ $pet->animal_size }}{{ $pet->animal_colour }}{{ $pet->animal_breed }}</h4>
									<div class="mb-1 text-muted"><i class="fa fa-home mr-2" aria-hidden="true"></i>{{ $pet->publicpet->shelter->shelter_name }}</div>
										<div class="mb-1 text-muted"><i class="fa fa-phone mr-2" aria-hidden="true"></i>{{ $pet->publicpet->shelter->shelter_tel }}</div>										
										<div class="mb-1 text-muted"><i class="fa fa-map-marker mr-3" aria-hidden="true"></i>{{ $pet->publicpet->shelter->shelter_address }}</div>
										<div class="mb-1 text-muted"><i class="fa fa-play mr-2" aria-hidden="true"></i>{{ $pet->animal_age }}</div>
										<p class="card-text mb-auto mt-2 ellipsis">{{ str_limit($pet->animal_description, 20) }}</p>
										<a href="/publicpets/show/{{ $pet->publicpet->public_pet_id }}" class="genric-btn primary small mt-3">詳細資料</a>
									</div>
									<div class=" col-md-6">
										<div class="single-cat-list mb-0">
											<img style="object-fit:cover;" src="{{ $pet->animal_img }}" alt="" class="img-fluid">
										</div>
									</div>
								</div>
							</div>							
						@endforeach
					</div>
					<div class="blog-pagination justify-content-center d-flex col-md-12">
					{{$pets->appends(request()->all())->links()}}
					</div>
            </section>
@endsection