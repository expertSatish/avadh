@extends('front_layouts/layout')
@extends('front_layouts/header')
@section('contentSection')

<!--============================== Content Start ==============================-->
<div class="content-container">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="main-heading mb-md-4">
                    <h3 style="text-align: center;">FAQs (Frequently asked questions)</h3>
                </div>
                <div class="caaby-list">
                    <div class="accordion" id="accordionExample1">
                        @php
                            $firstItem = true;
                        @endphp
                        @foreach($data as $index => $res)
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="heading{{$index}}">
                                <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#collapse{{$index}}" aria-expanded="{{ $firstItem ? 'true' : 'false' }}" aria-controls="collapse{{$index}}">
                                    {{$res->question}}
                                </button>
                            </h2>
                            <div id="collapse{{$index}}" class="accordion-collapse collapse {{ $firstItem ? 'show' : '' }}" aria-labelledby="heading{{$index}}"
                                data-bs-parent="#accordionExample1">
                                <div class="accordion-body pt-0">
                                    {!! htmlspecialchars_decode($res->answer)!!}
                                </div>
                            </div>
                        </div>
                        @php
                            $firstItem = false;
                        @endphp
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>




@endsection