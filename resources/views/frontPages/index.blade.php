@extends('front_layouts/layout')
@extends('front_layouts/header')
@section('contentSection')
<div class="content-container p-0">
    <div class="container">
        <div class="row os-animation" data-os-animation="fadeIn" data-os-animation-delay="0.5s">
            <div class="col-md-8">
                <div class="hero-slider-wrapper">
                    <ul class="hero-slide-list hero_img_slide white-dots">
                        @foreach($banner as $res)
                        <li class="hero-slide-item">
                            <a href="#!" class="hero-slide-box">
                                <div class="hero-slide-img">
                                    <img src="{{asset($res->banner)}}" alt="">
                                </div>
                            </a>
                        </li>
                        @endforeach
                    </ul>
                </div>
            </div>
            <div class="col-md-4">
                <div class="link-list">
                    @foreach($facility as $res)
                    <div class="link-item">
                        <a href="{{url('facility/'.$res->slug)}}" class="link-box">{{$res->title}}</a>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
<!--============================== Content End ==============================-->

<!--============================== Content Start ==============================-->
<div class="content-container p-0">
    <div class="container">
        <div class="marque mt-2 mb-3">
            <marquee behavior="" direction="left" onmouseover="stop()" onmouseout="start()">
                <div class="marqu-d">
                    <a href="#!" class="mark-1"><img src="{{asset('assets/front/images/new-gif.jpg')}}" alt="">Lorem
                        ipsum dolor sit amet
                        consectetur adipisicing elit. Nihil optio deserunt sapiente laudantium blanditiis vel impedit
                        eos. Maxime, laboriosam consequuntur consectetur asperiores aspernatur rem alias dolore, non
                        pariatur facere sunt?</a>
                </div>
            </marquee>
        </div>
    </div>
</div>
<!--============================== Content End ==============================-->
<!--============================== Content Start ==============================-->
<div class="content-container pt-0">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <div class="caaby-list">
                    <div class="accordion" id="accordionExample">
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="heading1">
                                <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#collapse1" aria-expanded="true" aria-controls="collapse1">
                                    Pharmacy program
                                </button>
                            </h2>
                            <div id="collapse1" class="accordion-collapse collapse show" aria-labelledby="heading1"
                                data-bs-parent="#accordionExample">
                                <div class="accordion-body">
                                    <div class="accordion" id="sub-accordionExample">
                                        @foreach($academic as $index => $data)
                                        <div class="accordion-item">
                                            <h2 class="accordion-header" id="sub-heading{{$index}}">
                                                <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                                    data-bs-target="#sub-collapse{{$index}}"
                                                    aria-expanded="{{ $index === 0 ? 'true' : 'false' }}"
                                                    aria-controls="sub-collapse{{$index}}"
                                                    style="font-size: 16px;">{{$data->academic_name}}</button>
                                            </h2>
                                            <div id="sub-collapse{{$index}}"
                                                class="accordion-collapse collapse {{ $index === 0 ? 'show' : '' }}"
                                                aria-labelledby="sub-heading{{$index}}"
                                                data-bs-parent="#sub-accordionExample">
                                                <div class="accordion-body">
                                                 @php
                                                  $description = $data->description ?? '';
                                                   $truncated = substr(strip_tags($description), 0, 700);
                                                       $showReadMore = strlen(strip_tags($description)) > 700;
                                                @endphp
                                                {!! $truncated !!}
                                           @if ($showReadMore)
                                               <a href="{{url('academic/'.$data->slug)}}" class="read-more-link" style="color:#16456e;">>>Read More</a>
                                               <div class="full-description" style="display: none;">
                                                  {!! $description !!}
                                             </div>
                                            @endif
                                                </div>
                                            </div>
                                        </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
                <div class="slick-box mt-2">
                    <div class="servie-upper">
                        <img src="{{asset('assets/front/images/book-img.png')}}" alt="">
                        <h5>What's New</h5>
                    </div>
                    <div class="service-box1" style="height: 270px;">
                        <ul class="lower-srvice vrtcl-slider">
                           
                            @foreach($news as $data)
                            <li>
                                <p>{{$data->title ?? ''}}<a
                                        href="{{url('news/'.$data->slug)}}">Read More..</a></p>
                                <div class="bullet-img">
                                    <img src="{{asset('assets/front/images/bullet7.gif')}}" alt="">
                                </div>
                            </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="caaby-list">
                    <div class="accordion" id="accordionExample1">
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="headingOne">
                                <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                    About us
                                </button>
                            </h2>
                            <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne"
                                data-bs-parent="#accordionExample1">
                                <div class="accordion-body pt-0">
                                    {!! htmlspecialchars_decode($about->description ?? '')!!}
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="headingTwo">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                    Vision, Mission & Objectives
                                </button>
                            </h2>
                            <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo"
                                data-bs-parent="#accordionExample1">
                                <div class="accordion-body pt-0">
                                    <strong>Vision:</strong>
                                    {!! htmlspecialchars_decode($vision->vision ?? '')!!}
                                    <strong>Mission:</strong>
                                    {!! htmlspecialchars_decode($vision->mission ?? '')!!}
                                    <strong>Objectives:</strong>
                                    {!! htmlspecialchars_decode($vision->objective ?? '')!!}
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="headingThree">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseTwo">
                                    Campus rules
                                </button>
                            </h2>
                            <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree"
                                data-bs-parent="#accordionExample1">
                                <div class="accordion-body pt-0">
                                    <p> Any applicant admitted to the college must follow the college's rules and
                                        regulations, as well as any adjustments made to them from time to time. As a
                                        result, no action will be possible.</p>
                                    <p> Every student must carry/bear his/her identity card while being in the campus.
                                    </p>
                                    <p>ents should be regular and punctual in classes, extracurricular/cocurricular
                                        activities from the start to the end of the semester.</p>
                                    <p> When attending college, students must agree to the campus dress code</p>
                                    <p> Students are expected to behave in a responsible manner and maintain decorum in
                                        the college.</p>
                                    <p></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="servie-upper" style="background: none; padding: 10px 0px;">
                    <h5>Approved By - PCI, AKTU, BTE</h5>
                </div>
                <ul class="college-related-list">
                    <li class="college-related-item">
                        <a href="#!" class="collage-related-img">
                            <img src="{{asset('assets/front/images/aktu-logo.png')}}" alt="">
                        </a>
                    </li>
                    <li class="college-related-item">
                        <a href="#!" class="collage-related-img">
                            <img src="{{asset('assets/front//images/pci-logo.png')}}" alt="">
                        </a>
                    </li>
                    <li class="college-related-item">
                        <a href="#!" class="collage-related-img">
                            <img src="{{asset('assets/front//images/bti-logo.jpg')}}" alt="">
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>
<!--============================== Content End ==============================-->

<!--============================== Content Start ==============================-->
<div class="content-container pt-0">
    <div class="container">
        <ul class="btn-list">
            <li class="btn-item">
                <a href="#!" class="yojna-list" style="background: #8b6fa7;">Teacher Portal</a>
            </li>
            <li class="btn-item">
                <a href="#!" class="yojna-list" style="background: #07a1a7;">Student Portal</a>
            </li>
            <li class="btn-item">
                <a href="{{route('imageGallery')}}" class="yojna-list" style="background: #668c66;">Photo Gallery</a>
            </li>
            <li class="btn-item">
                <a href="{{route('antiragging')}}" class="yojna-list" style="background: #a46971;">Anti – Ragging
                    Committee</a>
            </li>
            <li class="btn-item">
                <a href="{{ route('genderSensitization') }}" class="yojna-list" style="background: #b69c40;">Gender
                    Sensitization Committee</a>
            </li>
        </ul>
    </div>
</div>
@endsection