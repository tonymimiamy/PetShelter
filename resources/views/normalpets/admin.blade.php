@extends('layouts.frontend')

@section('hero')
<section class="banner-area relative" id="home">	
    <div class="overlay overlay-bg"></div>
    <div class="container">				
        <div class="row d-flex align-items-center justify-content-center">
            <div class="about-content col-lg-12">
                <h1 class="text-white">
                    會員資訊管理		
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
								<h1 class="mb-20">我的寵物</h1>
								<p>提醒您，我們將不會洩漏您的個人使用者資訊，請您務必填入正確資料，以方便領養配對。</p>
							</div>
						</div>
					</div>
					<ul class="nav nav-tabs" id="myTab" role="tablist">
						<li class="nav-item" role="presentation">
						  <a class="nav-link active" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">一般領養</a>
						</li>
						<li class="nav-item" role="presentation">
						  <a class="nav-link " id="contact-tab" data-toggle="tab" href="#contact" role="tab" aria-controls="contact" aria-selected="false">走失協尋</a>
						</li>
					  </ul>
					  <div class="tab-content" id="myTabContent">
						<div class="tab-pane fade show active" id="profile" role="tabpanel" aria-labelledby="profile-tab">
							<table class="table table">
								<thead class="thead-dark">
								  <tr>									
									<th scope="col">暱稱</th>
									<th scope="col">種類</th>
									<th scope="col">性別</th>
									<th scope="col">體型</th>
									<th scope="col">毛色</th>
									<th scope="col">年紀</th>
									<th scope="col">結紮</th>
									<th scope="col">所在地</th>
									<th scope="col">狀態</th>
									<th scope="col-2">資料管理</th>
								  </tr>
								</thead>
								<tbody>
                                    @foreach ($normalpets as $key => $normalpet)
                                        <tr>
                                            <td>{{ $normalpet->animal_name}}</td>
                                            <td>{{ $normalpet->animal_type }}</td>
                                            <td>{{ $normalpet->animal_sex }}</td>
                                            <td>{{ $normalpet->animal_size }}</td>
                                            <td>{{ $normalpet->animal_colour }}</td>
                                            <td>{{ $normalpet->animal_age }}</td>
                                            <td>{{ $normalpet->animal_ligation }}</td>
                                            <td>{{ $normalpet->animal_place }}</td>
											<td id='{{ 'status'.$normalpet->normalpet->normal_pet_id }}'>{{ $normalpet->normalpet->status == 1? '已領養': '未領養' }}</td>
                                            <td>
                                                <a href="/normalpets/{{ $normalpet->normalpet->normal_pet_id }}/edit" class="genric-btn info radius">編輯</a>                                                
                                                <button type="submit" onclick="adopt({{$normalpet->normalpet->normal_pet_id}})" class="genric-btn success radius">已領養</button>
                                            </td>								  
                                        </tr> 
                                    @endforeach
								</tbody>
							  </table>							 
						</div>
						<div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">
							<table class="table table">
								<thead class="thead-dark">
								  <tr class="text-nowrap">
									<th scope="col">暱稱</th>
									<th scope="col">種類</th>
									<th scope="col">性別</th>
									<th scope="col">體型  </th>
									<th scope="col">毛色</th>
									<th scope="col">年紀</th>
									{{-- <th scope="col">結紮</th> --}}
									<th scope="col">失蹤地點</th>
									<th scope="col">失蹤時間</th>
									<th scope="col">狀態</th>
									<th scope="col-2"></th>
								  </tr>
								</thead>
								<tbody>
                                    @foreach ($lostpets as $key => $lostpet)
                                        <tr> 
                                            <td>{{ $lostpet->animal_name}}</td>
                                            <td>{{ $lostpet->animal_type }}</td>
                                            <td>{{ $lostpet->animal_sex }}</td>
                                            <td>{{ $lostpet->animal_size }}</td>   
                                            <td>{{ $lostpet->animal_colour }}</td>
                                            <td>{{ $lostpet->animal_age }}</td>
                                            {{-- <td>{{ $lostpet->animal_ligation }}</td> --}}
                                            <td>{{ $lostpet->lostpet->lost_place }}</td>
                                            <td>{{ $lostpet->lostpet->lost_time }}</td>
                                            <td id='{{ 'loststatus'.$lostpet->lostpet->lost_pet_id }}'>{{ $lostpet->lostpet->status ==1? "已尋獲" : "未尋獲" }}</td>
                                            <td>
                                                <a href="/lostpets/{{ $lostpet->lostpet->lost_pet_id }}/edit" class="genric-btn info radius">編輯</a>                                                                    
                                                <button type="submit" onclick="found({{ $lostpet->lostpet->lost_pet_id }})" class="genric-btn success radius">已尋獲</button>
                                            </td>
                                    </tr>
                                    @endforeach
								</tbody>
							  </table>
							  
						</div>
					  </div>
				</div>	
			</section>			
@endsection

<script>
	// $.ajaxSetup({
    // headers: {
    //     'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    // }
	// });

	function adopt(normalPetID) {
		$.ajax({
			type:'PUT',
			url: '/normalpets/adopt/' + normalPetID,
			data: {
				normalPetID : normalPetID,
			},
			headers: {
				'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
			},
			success: function(data) {
				if(data.success) {
					$('#status'+ normalPetID).text('已領養')
				}
			},
			
		});
	}

	function found(lostPetID) {
		$.ajax({
			type:'PUT',
			url: '/lostpets/found/' + lostPetID,
			data: {
				lostPetID : lostPetID,
			},
			headers: {
				'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
			},
			success: function(data) {
				if(data.success) {
					$('#loststatus' + lostPetID).text('已尋獲')
				}
			},
		});
	}
	
</script>

