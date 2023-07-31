@extends('front_layouts/layout')
@extends('front_layouts/header')
@section('contentSection')
 <!--============================== Content Start ==============================-->
 <div class="content-container">
        <div class="container d-flex justify-content-center">
            <div class="row">
                <div class="col-md-12">
                    <div class="main-heqading">
                        <h3>{{$news->title}}</h3>
                    </div>
                    <div class="about-content">
                    {!! htmlspecialchars_decode($news->description ?? '')!!}
                    </div>
                </div>                           
            </div>
        </div>
    </div>
    @endsection