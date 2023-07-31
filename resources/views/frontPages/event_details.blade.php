@extends('front_layouts/layout')
@extends('front_layouts/header')
@section('contentSection')

<!--============================== Content Start ==============================-->
<div class="content-container">
    <div class="container">
        <div class="main-heqading">
            <h3>{{$eventdata->title ?? ''}}</h3>
            <p>{!!$eventdata->description ?? '' !!}</p>
        </div>
        <div class="gallery-list-img os-animation" data-os-animation="fadeInUp" data-os-animation-delay="0.4s">
            <?php
            $imageArray = explode('|', $eventdata->images ?? '');
            ?>
            <td>
                <?php
                foreach ($imageArray as $images) {
                ?>
                    <a href="{{asset($images)}}" class="gallery-list">
                        <img src="{{asset($images)}}" alt="">
                        <div class="search-icon">
                            <i class="fas fa-search-plus"></i>
                        </div>
                    </a>

                <?php
                }
                ?>
        </div>
    </div>
</div>

@endsection