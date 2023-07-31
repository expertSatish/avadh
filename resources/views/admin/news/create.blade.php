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
                    Add News</h5>
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
                <form action="{{ route('manage-news.store') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="card-body">
                        <div class="row">
                            <!-- Title -->
                            <div class="col-md-4 form-group">
                                <label>Title</label>
                                <input class="form-control @error('title') is-invalid @enderror" name="title"
                                    placeholder="Title" type="text" required />
                                @error('title')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <!-- Start Date -->
                            <div class="col-md-4 form-group">
                                <label>Start Date</label>
                                <input class="form-control @error('start_date') is-invalid @enderror" name="start_date"
                                    placeholder="Start Date" required type="date" />
                                @error('start_date')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <!-- Expiry Date -->
                            <div class="col-md-4 form-group">
                                <label>Expiry Date</label>
                                <input class="form-control @error('expiry_date') is-invalid @enderror"
                                    name="expiry_date" placeholder="Expiry" required type="date" />
                                @error('expiry_date')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="row">
                            <!-- PDF File -->
                            <div class="col-md-4 form-group">
                                <label>Pdf</label>
                                <input class="form-control @error('pdf') is-invalid @enderror" name="pdf"
                                    placeholder="File" type="file" />
                              
                            </div>
                            <!-- News Images -->
                            <div class="col-md-4 form-group">
                                <label>Images</label>
                                <input class="form-control @error('news_images.*') is-invalid @enderror"
                                    name="news_images[]" placeholder="" multiple type="file" />
                                
                            </div>
                            <!-- Link -->
                            <div class="col-md-4 form-group">
                                <label>Link</label>
                                <input class="form-control @error('link') is-invalid @enderror" name="link"
                                    placeholder="Link" type="text" />
                              
                            </div>
                        </div>
                        <div class="row">
                            <!-- Description -->
                            <div class="col-md-12 form-group">
                                <textarea class="ckeditor form-control @error('description') is-invalid @enderror"
                                    name="description" placeholder="Description"></textarea>
                                @error('description')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
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
                </form>
            </div>
            <!--end::Card-->
        </div>
    </div>
    <!--end::Container-->
</div>
<script src="//cdn.ckeditor.com/4.14.1/standard/ckeditor.js"></script>

<!--end::Entry-->
</div>
<!--end::Content-->
@endsection