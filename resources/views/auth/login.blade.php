	<!DOCTYPE html>
	<html lang="zxx" class="no-js">
	<head>
		<!-- Mobile Specific Meta -->
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<!-- Favicon-->
		<link rel="shortcut icon" href="img/fav.png">
		<!-- Author Meta -->
		<meta name="author" content="codepixer">
		<!-- Meta Description -->
		<meta name="description" content="">
		<!-- Meta Keyword -->
		<meta name="keywords" content="">
		<!-- meta character set -->
		<meta charset="UTF-8">
		<!-- Site Title -->
		<meta name="csrf-token" content="{{ csrf_token() }}">
		<title>Pet Shelter</title>

		<link href="https://fonts.googleapis.com/css?family=Poppins:100,200,400,300,500,600,700" rel="stylesheet"> 
			<!--
			CSS
			============================================= -->
			<link rel="stylesheet" href="/assets/css/linearicons.css">
			<link rel="stylesheet" href="/assets/css/font-awesome.min.css">
			<link rel="stylesheet" href="/assets/css/bootstrap.css">
			<link rel="stylesheet" href="/assets/css/magnific-popup.css">
			<link rel="stylesheet" href="/assets/css/nice-select.css">							
			<link rel="stylesheet" href="/assets/css/animate.min.css">
			<link rel="stylesheet" href="/assets/css/owl.carousel.css">
			<link rel="stylesheet" href="/assets/css/main.css">
		</head>
		<body>
			  <header id="header" id="home">
			    <div class="container main-menu">
			    	<div class="row align-items-center justify-content-between d-flex">
				      <div id="logo">
				        <a href="/"><img src="/assets/img/logo.png" alt="" title="" /></a>
				      </div>
				      <nav id="nav-menu-container">
				        <ul class="nav-menu">
				          <li class="menu-active"><a href="/">首頁</a></li>
				          <li><a href="publicpets/">公立領養</a></li>
				          <li><a href="normalpets/">一般領養</a></li>
				          <li><a href="lostpets/">走失協尋</a></li>
                          <li class="menu-has-children"><a href="">註冊登入</a>
                            <ul>
                                <li><a href="./">登入</a></li>
				                <li><a href="/register">註冊</a></li>
                            </ul>
                          </li> 	              				          	              
				        </ul>
				      </nav><!-- #nav-menu-container -->		    		
			    	</div>
			    </div>
			  </header><!-- #header -->

			<!-- start banner Area -->
			<section class="banner-area relative" id="home">	
				<div class="overlay overlay-bg"></div>
				<div class="container">				
					<div class="row d-flex align-items-center justify-content-center">
						<div class="about-content col-lg-12">
							<h1 class="text-white">
								會員登入			
							</h1>	
							<p class="text-white link-nav"><a href="/">首頁 </a>  <span class="lnr lnr-arrow-right"></span>會員登入</p>
						</div>	
					</div>
				</div>
			</section>
			<!-- End banner Area -->	
				
			<!-- Start cat-list Area -->
			<section class="post-content-area">
				<div class="container mt-40 mb-40">
					<div class="row justify-content-center">
						<div class="col-lg-5 sidebar-widgets mt-10 mb-10 ">
							<div class="widget-wrap">
                                <form class="single-sidebar-widget newsletter-widget" method="POST" action="{{ route('login') }}">
                                    @csrf
									<h4 class="newsletter-title">會員登入</h4>
									<p>
										登入會員即可使用一般認養、走失協尋功能喔！
									</p>
									<div class="form-group d-flex flex-row">
									<div class="col-autos">
										<div class="input-group">
											<div class="input-group-prepend">
											<div class="input-group-text">
												<i class="fa fa-envelope" aria-hidden="true"></i>
												</div>
											</div>
											<input type="email" name="email" class="form-control" id="inlineFormInputGroup" placeholder="輸入帳號" onfocus="this.placeholder = ''" onblur="this.placeholder = '輸入帳號'" >
										</div>
										</div>
									</div>	
									<div class="form-group d-flex flex-row">
										<div class="col-autos">
											<div class="input-group">
												<div class="input-group-prepend">
													<div class="input-group-text"><i class="fa fa-key" aria-hidden="true"></i>
													</div>
												</div>
												<input type="password" class="form-control" id="inlineFormInputGroup" placeholder="輸入密碼" onfocus="this.placeholder = ''" onblur="this.placeholder = '輸入密碼'" name="password">
											</div>
										</div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-md-6 offset-md-4">
                                            <div class="form-check">
                                                {{-- <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}> --}}

                                                {{-- <label class="form-check-label d-flex flex-row justify-content-star" for="remember">
                                                    {{ __('Remember Me') }}
                                                </label> --}}
                                            </div>
                                        </div>
                                    </div>
									<div class="button-group-area mt-10 form-group d-flex flex-row justify-content-start">
										<button type="submit" class="genric-btn success">送出</button>	
									</div>
								</form>							
							</div>
						</div>
					</div>
				</div>	
			</section>
																	
			<footer class="footer-area">
				<!-- <div class="container">
					<div class="row pt-120 pb-80">
						<div class="col-lg-4 col-md-6">
							<div class="single-footer-widget">
								<h6>About Us</h6>
								<p>
									Few would argue that, despite the advanc ements off eminism over the past three decades, women still face a double standard when it comes to their behavior. While men’s borderline-inappropriate behavior. Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
								</p>
							</div>
						</div>
						<div class="col-lg-4 col-md-6">
							<div class="single-footer-widget">
								<h6>Useful Links</h6>
								<div class="row">
									<ul class="col footer-nav">
										<li><a href="#">Home</a></li>
										<li><a href="#">Service</a></li>
										<li><a href="#">About</a></li>
										<li><a href="#">Case Study</a></li>
									</ul>
									<ul class="col footer-nav">
										<li><a href="#">Pricing</a></li>
										<li><a href="#">Team</a></li>
										<li><a href="#">Blog</a></li>
									</ul>									
								</div>
							</div>
						</div>						
						<div class="col-lg-4  col-md-6">
							<div class="single-footer-widget mail-chimp">
								<h6 class="mb-20">Contact Us</h6>
								<ul class="list-contact">
									<li class="flex-row d-flex">
										<div class="icon">
											<span class="lnr lnr-home"></span>
										</div>
										<div class="detail">
											<h4>Binghamton, New York</h4>
											<p>
												4343 Hinkle Deegan Lake Road
											</p>
										</div>	
									</li>
									<li class="flex-row d-flex">
										<div class="icon">
											<span class="lnr lnr-phone-handset"></span>
										</div>
										<div class="detail">
											<h4>00 (953) 9865 562</h4>
											<p>
												Mon to Fri 9am to 6 pm
											</p>
										</div>	
									</li>
									<li class="flex-row d-flex">
										<div class="icon">
											<span class="lnr lnr-envelope"></span>
										</div>
										<div class="detail">
											<h4>support@colorlib.com</h4>
											<p>
												Send us your query anytime!
											</p>
										</div>	
									</li>																		
								</ul>
							</div>
						</div>						
					</div>
				</div> -->
				<div class="copyright-text">
					<div class="container">
						<div class="row footer-bottom d-flex justify-content-center">
							<p class="col-lg-8 col-sm-6 footer-text m-0 text-white footer-text-align"><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
本站所有資訊來源為政府資料開放平台及會員自行刊登，本站對資訊內容無法確實檢查，僅就一般正常情理做審核，如有遺漏或侵犯它人權益由刊登者自行負擔相關責任。Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved
</p>
							{{-- <div class="col-lg-4 col-sm-6 footer-social text-white">Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved
								Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved
							</div> --}}
						</div>						
					</div>
				</div>
			</footer>

			<script src="/assets/js/vendor/jquery-2.2.4.min.js"></script>
			<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
			<script src="/assets/js/vendor/bootstrap.min.js"></script>			
			<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBhOdIF3Y9382fqJYt5I_sswSrEw5eihAA"></script>
  			<script src="/assets/js/easing.min.js"></script>			
			<script src="/assets/js/hoverIntent.js"></script>
			<script src="/assets/js/superfish.min.js"></script>	
			<script src="/assets/js/jquery.ajaxchimp.min.js"></script>
			<script src="/assets/js/jquery.magnific-popup.min.js"></script>	
			<script src="/assets/js/owl.carousel.min.js"></script>						
			<script src="/assets/js/jquery.nice-select.min.js"></script>							
			<script src="/assets/js/mail-script.js"></script>	
			<script src="/assets/js/main.js"></script>	
		</body>
	</html>