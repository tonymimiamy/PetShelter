@extends('layouts.frontend')

@section('hero')
<section class="banner-area relative" id="home">	
    <div class="overlay overlay-bg"></div>
    <div class="container">				
        <div class="row d-flex align-items-center justify-content-center">
            <div class="about-content col-lg-12">
                <h1 class="text-white">
                    修改刊登資料			
                </h1>	
            </div>	
        </div>
    </div>
</section>
@endsection

@section('content')
    		<section class="Volunteer-form-area section-gap">
				<div class="container">
					<div class="row d-flex justify-content-center">
						<div class="menu-content pb-60 col-lg-9">
							<div class="title text-center">
								<h1 class="mb-20">刊登資料</h1>
								<p>提醒您，我們將不會洩漏您的個人使用者資訊，請您務必填入正確資料，以方便領養配對。</p>
							</div>
						</div>
					</div>						
					<div class="row justify-content-center">
                        <form method="post" action="/normalpets/{{ $pet->normalpet->normal_pet_id }}" class="col-lg-9" enctype="multipart/form-data">
                            @csrf 
                            <input type="hidden" name="_method" value="put">                         
						  <div class="form-group">
						    <label for="first-name">寵物大名</label>
						    <input name="animal_name" value="{{ $pet->animal_name }}" type="text" class="form-control" placeholder="寵物大名">
						  </div>
						  <div class="form-group">
						    <label for="last-name">寵物品種</label>
						    <input name="animal_breed" value="{{ $pet->animal_breed }}" type="text" class="form-control" placeholder="品種">
						  </div>						  
						  <div class="form-group">
						    <label for="Address">所在地</label>
						    <input name="animal_place" value="{{ $pet->animal_place }}" type="text" class="form-control mb-20" placeholder="所在地">
						  </div>
						  <div class="form-group custom-file">
                            <div class="col-4 mt-5">
                                <img class="img-fluid col" src="{{ $pet->animal_img }}" alt="">
                            </div>
                            <input type="file" class="custom-file-input form-control" id="customFile" name="animal_img">   
                            <label class="custom-file-label" for="customFile">圖片上傳</label>						                         
						  </div>                        
						  <div class="form-row">
						  	<div class="col-6 mb-30">
						  		<label for="City">性別</label>
						   		<div class="select-option" id="service-select">
									<select name="animal_sex">
										<option data-display="選擇性別">選擇性別</option>
										<option @if(isset($pet)&&$pet['animal_sex']=="公") selected @endif value="公">公</option>
										<option @if(isset($pet)&&$pet['animal_sex']=="母") selected @endif value="母">母</option>
									</select>
								</div>	
						  	</div>
						  	<div class="col-6 mb-30">
						  		<label for="state">體型</label>
						   		<div class="select-option" id="service-select">
									<select name="animal_size">
										<option data-display="選擇體型">選擇體型</option>
										<option @if(isset($pet)&&$pet['animal_size']=="小型寵物") selected @endif value="小型寵物">小型寵物</option>
										<option @if(isset($pet)&&$pet['animal_size']=="中型寵物") selected @endif value="中型寵物">中型寵物</option>
										<option @if(isset($pet)&&$pet['animal_size']=="大型寵物") selected @endif value="大型寵物">大型寵物</option>
									</select>
								</div>						  		
						  	</div>						  	
						  	<div class="col-6 mb-30">
						  		<label for="Country">是否結紮</label>
						   		<div name="animal_ligation" class="select-option"id="service-select">
									<select name="animal_ligation">
										<option data-display="是否結紮">是否結紮</option>
										<option @if(isset($pet)&&$pet['animal_ligation']=="已結紮") selected @endif value="已結紮">已結紮</option>
										<option @if(isset($pet)&&$pet['animal_ligation']=="已結紮") selected @endif value="未結紮">未結紮</option>
									</select>
								</div>	
						  	</div>					  	
						  	<div class="col-6 mb-30">
						  		<label for="Country">寵物種類</label>
						   		<div class="select-option" id="service-select">
                                       
									<select name="animal_type">
										<option data-display="寵物種類">寵物種類</option>
										<option @if(isset($pet)&&$pet['animal_type']=="狗") selected @endif value="狗">狗</option>
										<option @if(isset($pet)&&$pet['animal_type']=="貓") selected @endif value="貓">貓</option>
                                        <option @if(isset($pet)&&$pet['animal_type']=="其他") selected @endif value="其他">其他</option>                                        
                                    </select>
								</div>	
							  </div>
						  	<div class="col-6 mb-30">
						  		<label for="Country">年紀</label>
						   		<div class="select-option" id="service-select">
									<select name="animal_age" value=" {{ $pet->animal_age }} ">
										<option data-display="寵物年紀">年紀</option>
										<option @if(isset($pet)&&$pet['animal_age']=="幼年") selected @endif value="幼年">幼年</option>
										<option @if(isset($pet)&&$pet['animal_age']=="成年") selected @endif value="成年">成年</option>
										<option @if(isset($pet)&&$pet['animal_age']=="老年") selected @endif value="老年">老年</option>
									</select>
								</div>	
							  </div>
						  	<div class="col-6 mb-30">
								<label for="last-name">毛色</label>
								<input name="animal_colour" value="{{ $pet->animal_colour }}" type="text" class="form-control" placeholder="毛髮顏色">
							  </div>			  	
						  </div>		
						  <div class="form-group">
						    <label for="note">寵物描述</label>
						    <textarea name="animal_description" class="form-control" id="exampleTextarea" rows="5" placeholder="多寫點關於您的寵物將能增加認養機會">{{ $pet->animal_description }}</textarea>
						  </div>						  
						  <button type="submit" class="primary-btn float-right">送出資料</button>
						</form>
					</div>
				</div>	
			</section>
@endsection