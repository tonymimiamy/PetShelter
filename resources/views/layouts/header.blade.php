			  <header id="header" id="home">
			    <div class="container main-menu">
			    	<div class="row align-items-center justify-content-between d-flex">
				      <div id="logo">
				        <a href="/"><img src="/assets/img/logo1.png" alt="" title="" /></a>
				      </div>
				      <nav id="nav-menu-container">
				        <ul class="nav-menu">
						  <li class="menu-active"><a href="/">首頁</a></li>
						  <li class="menu-has-children"><a href="">領養浪浪</a>
							  <ul>
								<li><a href="/publicpets">公立領養</a></li>
								<li><a href="/normalpets">一般領養</a></li>
							  </ul>
						  </li>
						  <li><a href="/lostpets">走失協尋</a></li>
						  @guest
						  <li class="menu-has-children"><a href="">註冊登入</a>
                            <ul>
							@guest
									<li><a href="{{ route('login') }}">登入</a></li>
								@if (Route::has('register'))
									<li><a href="{{ route('register') }}">註冊</a></li>
								@endif				                
							@endguest
                            </ul>
						  </li>
						  @else
						  <li class="menu-has-children"><a href="">會員中心</a>
							<ul>
								<li><a href="/editmember">會員資料修改</a></li>	
								<li><a href="/normalpets/admin">會員資訊管理</a></li>
								@can('admin')
								<li><a href="/normalpets/useradmin">管理者資訊管理</a></li>	
								@endcan
								
								<li>
									<a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('登出') }}
									</a>
									<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
										@csrf
									</form>
								</li>
							</ul>
						  </li>	
						  @endguest
                           
						  	              				          	              
				        </ul>
				      </nav><!-- #nav-menu-container -->		    		
			    	</div>
			    </div>
			  </header><!-- #header -->