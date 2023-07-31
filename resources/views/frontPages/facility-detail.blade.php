@extends('front_layouts/layout')
@extends('front_layouts/header')
@section('contentSection')
 <!--============================== Content Start ==============================-->
 <div class="content-container">
        <div class="container">
            <div class="row">
                <div class="col-md-7">
                    <div class="main-heqading">
                        <h3>{{$facility->title ?? ''}}</h3>
                    </div>
                    <div class="about-content">
                    {!! htmlspecialchars_decode($facility->description ?? '')!!}
                    </div>
                </div> 
                <div class="col-md-5">
                    <div class="faculty-img">
                     <img src="{{asset($facility->facility_image)}}" alt=""> 
                    </div>
                </div>                           
            </div>
        </div>
    </div>
    @endsection