@extends('front_layouts/layout')
@extends('front_layouts/header')
@section('contentSection')
<!--============================== Content Start ==============================-->
<div class="content-container">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <ul class="product_list type_2 d-flex flex-wrap">
                    @foreach($eventCategory as $data)
                    <li class="product_item">
                        <a href="{{url('event-details/'.$data->slug)}}" class="product_box">
                            <div class="product_thumb">
                              
                                <img src="{{asset($data->thumbnail_img ?? '')}}" alt="">
                            </div>
                            <div class="product_content">
                                <h4>{{$data->title ?? ''}}</h4>
                                <p>{{$data->short_desc ?? ''}}</p>
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