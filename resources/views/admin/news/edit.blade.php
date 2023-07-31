@extends('layouts.app')
@section('content')
@include('admin.aside')
<div class="content py-0 d-flex flex-column flex-column-fluid" id="kt_content">
    <!--begin::Subheader-->
    <div class="subheader py-2 py-lg-4  subheader-solid " id="kt_subheader">
        <div class=" container-fluid  d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
            <!--begin::Info-->
            <div class="d-flex align-items-center flex-wrap mr-2">

                <!--begin::Page Title-->
                <h5 class="text-dark font-weight-bold mt-2 mb-2 mr-5">
                    Update News</h5>
                <!--end::Page Title-->

            </div>
            <!--end::Info-->
        </div>
    </div>
    <!--begin::Entry-->
    <div class="d-flex flex-column-fluid">
        <!--begin::Container-->
        <div class=" container card-fixed-align">
            <!--begin::Card-->
            @if(session('success'))
            <div class="alert alert-custom alert-success fade show m-4 p-3" role="alert">
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
            <div class="alert alert-custom alert-danger fade show m-4 p-3" role="alert">
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
                <!--begin::Form-->
                <form action="{{route('manage-news.update',$data->id)}}" method="post" enctype="multipart/form-data">
                    @method('PATCH')
                    @csrf
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-4 form-group">
                                <label>Title</label>
                                <input class="form-control" name="title" placeholder="Title" type="text"
                                value="@if(old('title')){{ old('title') }}@elseif($data){{$data->title}}@endif" required />
                            </div>
                            <div class="col-md-4 form-group">
                                <label>Start Date</label>
                                <input class="form-control" name="start_date" placeholder="Start date" type="date"
                                value="@if(old('start_date')){{ old('start_date') }}@elseif($data){{$data->start_date}}@endif" required />
                            </div>
                            <div class="col-md-4 form-group">
                                <label>Expiry Date</label>
                                <input class="form-control" name="expiry_date" placeholder="Expiry date" type="date"
                                value="@if(old('expiry_date')){{ old('expiry_date') }}@elseif($data){{$data->expiry_date}}@endif" required />
                            </div>

                        </div>
                        <div class="row">
                            <!-- PDF File -->
                            <div class="col-md-4 form-group">
                                <label>Pdf</label>
                                <input class="form-control"  name="pdf" placeholder="File" type="file" />
                              
                            </div>
                            <!-- News Images -->
                            <div class="col-md-4 form-group">
                                <label>Images</label>
                                <input class="form-control  "name="news_images[]" placeholder="" multiple type="file" />
                                
                            </div>
                            <!-- Link -->
                            <div class="col-md-4 form-group">
                                <label>Link</label>
                                <input class="form-control @error('link') is-invalid @enderror" value="@if(old('link')){{ old('link') }}@elseif($data){{$data->link}}@endif" name="link"
                                    placeholder="Link" type="text" />
                              
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12 form-group">
                                <textarea class="ckeditor form-control " name="description" type="text"
                                    placeholder="Description">@if(old('description')){{ old('description') }}@elseif($data){{$data->description}}@endif</textarea>
                                @if($errors->has('description'))
                                <div class="invalid-feedback">{{ $errors->first('description') }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="card-footer pb-0 px-0">
                            <div class="row">
                                <div class="col-12 d-flex justify-content-end">
                                    <button type="submit" class="btn btn-success mr-2">Submit</button>
                                    <button type="reset" class="btn btn-danger">Cancel</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <!--end::Card-->
        </div>
    </div>
    <!--end::Container-->
</div>
<!--end::Entry-->
<script src="//cdn.ckeditor.com/4.14.1/standard/ckeditor.js"></script>

</div>
<!--end::Content-->
@endsection