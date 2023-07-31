@extends('layouts.app')
@section('content')
@include('admin.aside')
<!--begin::Entry-->
<div class="d-flex flex-column-fluid">
    <!--begin::Container-->
    <div class=" container ">
        <!--begin::Card-->
        @if(session('success'))
        <div class="alert alert-custom alert-success fade show" role="alert">
            <div class="alert-icon"><i class="flaticon2-check-mark"></i></div>
            <div class="alert-text">{{ session('success')}}</div>
            <div class="alert-close">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true"><i class="ki ki-close"></i></span>
                </button>
            </div>
        </div>
        @endif
        @if(session('failed'))
        <div class="alert alert-custom alert-danger fade show" role="alert">
            <div class="alert-icon"><i class="flaticon-warning"></i></div>
            <div class="alert-text">{{ session('failed')}}</div>
            <div class="alert-close">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true"><i class="ki ki-close"></i></span>
                </button>
            </div>
        </div>
        @endif

        <div class="card card-custom">
            <div class="card-header">
                <h3 class="card-title">
                    Update FaQ
                </h3>
            </div>
            <form action="{{route('faq.update',$data->id)}}" method="post" enctype="multipart/form-data">
                @csrf
                @method('PATCH')
                <div class="card-body">
                    <div class="form-group row">
                        <div class="col-md-6 form-group">
                            <label>Question </label>
                            <input class="form-control" name="question"
                                value="@if(old('question')){{ old('question') }}@elseif($data){{$data->question}}@endif"
                                type="text" placeholder="Question" />
                        </div>
                    </div>

                        <div class="form-group row">
                            <div class="col-md-12 form-group">
                                <label>Answer </label>
                                <textarea class="ckeditor form-control" name="answer" type="text"
                                    placeholder="Answer">@if(old('answer')){{ old('answer') }}@elseif($data){{$data->answer}}@endif</textarea>
                            </div>
                        </div>

                    </div>
                <div class="card-footer">
                    <div class="row">
                        <div class="col-2">
                        </div>
                        <div class="col-10">
                            <button type="submit" class="btn btn-success mr-2">Submit</button>
                            <a href="{{route('faq.index')}}" class="btn btn-secondary">Cancel</a>
                        </div>
                    </div>
                </div>
            </form>
        </div>
        <!--end::Card-->
    </div>
    <!--end::Container-->
</div>
<!--end::Entry-->
</div>
<script src="//cdn.ckeditor.com/4.14.1/standard/ckeditor.js"></script>


<!--end::Content-->
@endsection