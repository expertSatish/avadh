@extends('front_layouts/layout')
@extends('front_layouts/header')
@section('contentSection')

<!--============================== Content Start ==============================-->
<div class="content-container">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="main-heqading">
                    <h3 style="text-align: center;">Photo Gallery</h3>
                </div>
                <div class="gallery-list-img os-animation" data-os-animation="fadeInUp" data-os-animation-delay="0.4s">
                    <td>
                        <?php
                        foreach ($galleryItems as $gallery) {
                            $imageArray = explode('|', $gallery->image);
                            foreach ($imageArray as $image) {
                        ?>
                                <a href="{{ asset($image) }}" class="gallery-list">
                                    <img src="{{ asset($image) }}" alt="">
                                    <div class="search-icon">
                                        <i class="fas fa-search-plus"></i>
                                    </div>
                                </a>
                        <?php
                            }
                        }
                        ?>
                    </td>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection