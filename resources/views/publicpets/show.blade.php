@extends('layouts.frontend')

@section('hero')
			<section class="banner-area-pubic relative" id="home">	
				<div class="overlay overlay-bg"></div>
				<div class="container">				
					<div class="row d-flex align-items-center justify-content-center">
						<div class="about-content col-lg-12">
							<h1 class="text-white">
								寵物詳細資料				
							</h1>	
							<!-- <p class="text-white link-nav"><a href="index.html">Home </a>  <span class="lnr lnr-arrow-right"></span>  <a href="cats.html"> Cats</a></p> -->
						</div>	
					</div>
				</div>
			</section>
@endsection

@section('content')
<section class="post-content-area single-post-area">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 posts-list">
                <div class="single-post row">
                    <div class="col-lg-12">
                            <div class="row mt-30 mb-30">
                                <div class="col-6">
                                    <img class="img-fluid col" src="{{ $pet->animal_img }}" alt="">
                                </div>
                                <div class="col-lg-12 mt-30">
                                    <p>
                                        {{ $pet->animal_description }}
                                    </p>									
                                </div>	
                            </div>
                    </div>
                </div>
            </div>
                <div class="col-lg-4 sidebar-widgets">
                    <div class="widget-wrap">
                        <div class="single-sidebar-widget post-category-widget">
                            <h4 class="category-title mb-30">{{ $pet->animal_name }}</h4>
                            <ul class="cat-list">
                                <li>
                                    <a href="#" class="d-flex justify-content-between">
                                        <p>品種</p>
                                        <p>{{ $pet->animal_breed }}</p>
                                    </a>
                                </li>
                                <li>
                                    <a href="#" class="d-flex justify-content-between">
                                        <p>種類</p>
                                        <p>{{ $pet->animal_type }}</p>
                                    </a>
                                </li>
                                <li>
                                    <a href="#" class="d-flex justify-content-between">
                                        <p>性別</p>
                                        <p>{{ $pet->animal_sex }}</p>
                                    </a>
                                </li>
                                <li>
                                    <a href="#" class="d-flex justify-content-between">
                                        <p>體型</p>
                                        <p>{{ $pet->animal_size }}</p>
                                    </a>
                                </li>
                                <li>
                                    <a href="#" class="d-flex justify-content-between">
                                        <p>毛色</p>
                                        <p>{{ $pet->animal_colour }}</p>
                                    </a>
                                </li>
                                <li>
                                    <a href="#" class="d-flex justify-content-between">
                                        <p>年紀</p>
                                        <p>{{ $pet->animal_age }}</p>
                                    </a>
                                </li>
                                <li>
                                    <a href="#" class="d-flex justify-content-between">
                                        <p>結紮</p>
                                        <p>{{ $pet->animal_ligation }}</p>
                                    </a>
                                </li>															
                                <li>
                                    <a href="#" class="d-flex justify-content-between">
                                        <p>所在地</p>
                                        <p>{{ $pet->animal_place }}</p>
                                    </a>
                                </li>															
                            </ul>
                        </div>	                                                    
                    </div>
                </div>
                <div class="col-lg-12 quotes">
                    提醒您！ 目前送養、走失協尋、送別等資訊均為免費刊登，不會使用任何方式要求付費。
                </div>
        </div>
    </div>	
</section>
@endsection