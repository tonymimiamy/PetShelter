@extends('layouts.frontend')
@section('hero')
<section class="banner-area relative" id="home">
    <div class="container">
        <div class="overlay overlay-bg"></div>
        <div class="row fullscreen d-flex align-items-center justify-content-start">
            <div class="banner-content col-lg-8 col-md-12">
                <h1 class="text-uppercase">
                    領養代替購買 <br>
                    幫浪浪找一個家
                </h1>
                <p class="text-white sub-head">
                    愛牠就不要拋棄牠，浪愛有家。
                </p>
                <a href="/normalpets" class="primary-btn header-btn text-uppercase">馬上尋找寵物</a>
            </div>											
        </div>
    </div>
</section>
@endsection
@section('content')
    <section class="image-carusel-area">
        <div class="container">
            <div class="row">
                <div class="active-image-carusel">
                    <div class="single-image-carusel">
                        <img class="img-fluid" src="/assets/img/ban9.jpg" alt="">
                    </div>
                    <div class="single-image-carusel">
                        <img class="img-fluid" src="/assets/img/ban2.jpg" alt="">
                    </div>
                    <div class="single-image-carusel">
                        <img class="img-fluid" src="/assets/img/ban3.jpg" alt="">
                    </div>
                    <div class="single-image-carusel">
                        <img class="img-fluid" src="/assets/img/ban4.jpg" alt="">
                    </div>	
                    <div class="single-image-carusel">
                        <img class="img-fluid" src="/assets/img/ban5.jpg" alt="">
                    </div>
                    <div class="single-image-carusel">
                        <img class="img-fluid" src="/assets/img/ban6.jpg" alt="">
                    </div>
                    <div class="single-image-carusel">
                        <img class="img-fluid" src="/assets/img/ban7.jpg" alt="">
                    </div>
                    <div class="single-image-carusel">
                        <img class="img-fluid" src="/assets/img/ban8.jpg" alt="">
                    </div>
                    <div class="single-image-carusel">
                        <img class="img-fluid" src="/assets/img/ban1.jpg" alt="">
                    </div>
                    <div class="single-image-carusel">
                        <img class="img-fluid" src="/assets/img/ban10.jpg" alt="">
                    </div>
                    <div class="single-image-carusel">
                        <img class="img-fluid" src="/assets/img/ban11.jpg" alt="">
                    </div>
                    <div class="single-image-carusel">
                        <img class="img-fluid" src="/assets/img/ban12.jpg" alt="">
                    </div>															
                </div>
            </div>
        </div>	
    </section>

    <section class="callto-top-area section-gap">
        <div class="container">
            <div class="row justify-content-between callto-top-wrap pt-40 pb-40">
                <div class="col-lg-8 callto-top-left">
                    <h1>浪浪不要怕，我們一起回家</h1>
                </div>
                <div class="col-lg-4 callto-top-right">
                    <a href="register" class="primary-btn">註冊立即選擇自己的寵物</a>
                </div>							
            </div>
        </div>	
    </section>

    <section class="home-about-area">
        <div class="container-fluid">
            <div class="row align-items-center">	
                <div class="col-lg-6 home-about-left no-padding">
                    <img src="/assets/img/about.jpg" alt="">
                </div>
                <div class="col-lg-6 home-about-right no-padding">
                    <h1>
                        關於 Pet Shelter
                    </h1>
                    <h5>「盡己所能、善行延續」</h5>
                    <p>
                        一群喜歡寵物的年輕人，在經歷寵物離開自己後，希望能將對牠的愛延續下去，因此創建這個寵物送領養的平台，冀望能藉由這個平台讓更多的浪浪能擁有一個家，讓有意願領養動物的人都可以輕鬆的找到願意接納的寵物。目前我們傾向不收費用盡已所能的運作方向，也歡迎相關公益團體或法人與我們聯絡提案合作，我們願意盡量支持與配合。
                    </p>
                </div>
            </div>
        </div>	
    </section>

    <section class="calltoaction-area section-gap relative">
        <div class="container">
            <div class="overlay overlay-bg"></div>						
            <div class="row align-items-center justify-content-center">
                <h1 class="text-white">支持領養代替購買，結紮代替撲殺</h1>
                <p class="text-white">
                    我們提供公立收容所和自行刊登的領養資訊，愛護動物不需要任何言語來說服，請在飼養寵物前考慮清楚，不要隨意棄養！提醒您！ 目前送養、走失協尋、送別等資訊均為免費刊登，不會使用任何方式要求付費。
                </p>
                <!-- <div class="buttons d-flex flex-row">
                    <a href="#" class="primary-btn text-uppercase">公立領養所</a>
                    <a href="#" class="primary-btn text-uppercase">一般領養</a>
                </div> -->
            </div>
        </div>	
    </section>
@endsection