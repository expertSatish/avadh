 
 @extends('front_layouts/layout')
@extends('front_layouts/header')
@section('contentSection')
 <!--============================== Content Start ==============================-->
 <div class="content-container">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="main-heqading">
                        <h3>Academic Programme</h3>
                    </div>
                    <ul class="product_list type_2 d-flex flex-wrap">
                        @foreach($academic as $res)
                        <li class="product_item">
                            <a href="{{url('academic/'.$res->slug)}}" class="product_box">
                                <div class="product_thumb">
                                    <img src="{{asset('assets/front/images/library-img.jpeg')}}" alt="">
                                </div>
                                <div class="product_content">
                                    <h4>{{$res->academic_name}}</h4>
                                    <p></p>
                                </div>
                            </a>
                        </li>
                        @endforeach
                    </ul>
                </div>                           
            </div>
        </div>
    </div>
    @endsection