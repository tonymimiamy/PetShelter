@extends('layouts.frontend')

@section('hero')
			<section class="banner-area-private relative" id="home">	
				<div class="overlay overlay-bg"></div>
				<div class="container">				
					<div class="row d-flex align-items-center justify-content-center">
						<div class="about-content col-lg-12">
							<h1 class="text-white">
								寵物詳細資料			
							</h1>	
							<!-- <p class="text-white link-nav"><a href="index.html">Home </a>  <span class="lnr lnr-arrow-right"></span>  <a href="dogs.html"> dogs</a></p> -->
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
                        <div class="row mt-30 mb-30 justify-content-center">
                            <div class="col-6">
                                <img class="img-fluid col" src="{{ $pet->animal_img }}" alt="">
                            </div>                            
                            <div class="col-lg-12 mt-30">
                            <p>
                                {{ $pet->animal_description }}
                            </p>
                            <div class="col-lg-12 quotes">
                                提醒您！ 目前送養、走失協尋、送別等資訊均為免費刊登，不會使用任何方式要求付費。
                            </div>									
                        </div>	
                    </div>                                                                                               
                        <div class="comments-area">
                            <h4>回應</h4>
                            @foreach ($pet->comments as $key =>$comment)                            
                            <div class="comment-list media">                                
                                <div class="single-comment justify-content-between d-flex">                                                                     
                                    <div class="user justify-content-between d-flex">                                           
                                        <div class="thumb">
                                            <img src="{{ $comment->user->user_img }}" alt="">
                                        </div>
                                        <div class="desc">
                                            <h5>{{ $comment->name }}</h5>
                                            <p class="date">{{ $comment->created_at->format('Y-m-d H:i') }}</p>
                                            <p class="comment">
                                                {{ $comment->comment }}
                                            </p>
                                        </div>                                                                        
                                    </div>                                    
                                    <button type="button" class="close" onclick="deleteComment(event)"data-action="/normalpets/show/{{ $comment->id }} aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>                                
                                </div>                                
                            </div>   
                            @endforeach                        	               				
                        </div>
                         

                        <div class="comment-form">
                            <h4>留言板</h4>
                            <form method="post" action="/normalpetsComment">
                                @csrf
                                <input type="hidden" name="pet_id" value="{{ $pet->normalpet->pet_id }}">
                                <div class="form-group form-inline">
                                    <div class="form-group col-lg-12 col-md-12 name">
                                    <input type="text" class="form-control" name="name" id="name" placeholder="暱稱" onfocus="this.placeholder = ''" onblur="this.placeholder = '暱稱'">
                                    </div>									
                                </div>
                                <div class="form-group">
                                    <textarea class="form-control mb-10" rows="5" name="comment" placeholder="留下訊息" onfocus="this.placeholder = ''" onblur="this.placeholder = '留下訊息'"  required=""></textarea>
                                </div>
                                <button type="submit" class="primary-btn text-uppercase">留言</button>
                                    
                            </form>
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
                    @guest
                    
                    @else
                    <div class="single-sidebar-widget user-info-widget">
                        <div class="thumb">
                            <img src="{{ $normalpet->user->user_img }}" alt="">    
                        </div>                            
                        <h4 class="mt-10">聯絡人：{{$normalpet->user->name}}</h4>
                        <h4 class="mt-10 mb-20">{{$normalpet->user->phonenumber}}</h4>                            
                    </div>
                    @endguest

                                
                </div>
            </div>                
        </div>
    </div>	
</section>
@endsection