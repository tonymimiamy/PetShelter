@extends('layouts.frontend')
@section('hero')
<section class="banner-area relative" id="home">	
    <div class="overlay overlay-bg"></div>
    <div class="container">				
        <div class="row d-flex align-items-center justify-content-center">
            <div class="about-content col-lg-12">
                <h1 class="text-white">
                    會員資料修改			
                </h1>	
            </div>	
        </div>
    </div>
</section>
@endsection
@section('content')
	
				
			<!-- Start Volunteer-form Area -->
			<section class="Volunteer-form-area section-gap">
				<div class="container">
					<div class="row d-flex justify-content-center">
						<div class="menu-content pb-60 col-lg-9">
							<div class="title text-center">
								<h1 class="mb-20">修改會員資料</h1>
								<p>提醒您，我們將不會洩漏您的個人使用者資訊，請您務必填入正確資料，以方便領養配對。</p>
							</div>
						</div>
					</div>						
					<div class="row justify-content-center">
						<form method="post" action="/editmember" class="col-lg-6" enctype="multipart/form-data">
							@csrf
							<input type="hidden" name="_method" value="put">
						  <div class="form-group">
						    <label for="account">Email信箱</label>
						    <input type="email" class="form-control" value="{{ Auth::user()->email }}" placeholder="會員帳號" name="email" disabled>
						  </div>
						  <div class="form-group">
						    <label for="password">會員密碼</label>
						    <input type="password" value="{{ Auth::user()->password }}" name="password" class="form-control" placeholder="會員密碼" id="password">
						  </div>						  
						  <div class="form-group">
						    <label for="">確認密碼</label>
						    <input type="password" value="{{ Auth::user()->password }}" name="password" class="form-control" placeholder="確認密碼">
						  </div>					
						  <div class="form-group">
							<label for="customFile">上傳照片</label>
							<input type="file" id="customFile" name="user_img" class="form-control mb-20 uploadPic">
							<div>
								<img id="demo" src="{{ Auth::user()->user_img }}" alt="" class="col-md-6 img-fluid col-sm-12">
							</div>
						  </div>	  
						  <div class="form-group">
						    <label for="userName">會員姓名</label>
						    <input type="text" value="{{ Auth::user()->name }}" name="name" class="form-control mb-20" placeholder="會員姓名" id="userName">
						  </div>							  
						  <div class="form-group">
						    <label for="userPhone">會員電話</label>
						    <input type="tel" value="{{ Auth::user()->phonenumber }}" name="phonenumber" class="form-control mb-20" placeholder="會員電話" id="userPhone">
						  </div>				  						  
						  <button type="submit" class="genric-btn info float-left">送出資料</button>
						</form>
					</div>
				</div>	
			</section>
@endsection