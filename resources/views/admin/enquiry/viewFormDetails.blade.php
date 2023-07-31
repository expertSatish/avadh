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
                    Online Admission Form</h5>
                <div class="subheader-separator subheader-separator-ver mt-2 mb-2 mr-4 bg-gray-200"></div>
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

                <div class="card-body">
                    <div class="row">
                        <div class="col-md-8">
                        </div>
                        <div class="col-md-4">
                            <img src="{{asset($complete_form->user_picture)}}" alt="" style="width:90px;height:90px;">
                        </div>
                    </div>
                    <div class="row mt-4">
                        <div class="col-md-6">
                            <span>Course:</span>
                            <input type="text" value="{{$complete_form->course}}" class="form-control" disabled>
                        </div>
                        <div class="col-md-6">
                            <span>Name:</span>
                            <input type="text" value="{{$complete_form->name}}" class="form-control" disabled>
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-md-6">
                            <span>Father Name:</span>
                            <input type="text" value="{{$complete_form->father_name}}" class="form-control" disabled>
                        </div>
                        <div class="col-md-6">
                            <span>Mother Name:</span>
                            <input type="text" value="{{$complete_form->mother_name}}" class="form-control" disabled>
                        </div>
                    </div>
                    <div class="row  mt-3">
                        <div class="col-md-6">
                            <span>Date of Birth:</span>
                            <input type="text" value="{{$complete_form->dob}}" class="form-control" disabled>
                        </div>
                        <div class="col-md-6">
                            <span>Address:</span>
                            <input type="text" value="{{$complete_form->address}}" class="form-control" disabled>
                        </div>
                    </div>

                    <div class="row  mt-3">
                        <div class="col-md-6">
                            <span>Phone No. :</span>
                            <input type="text" value="{{$complete_form->phone}}" class="form-control" disabled>
                        </div>
                        <div class="col-md-6">
                            <span>Guardian Phone:</span>
                            <input type="text" value="{{$complete_form->guardian_phone}}" class="form-control" disabled>
                        </div>
                    </div>

                    <div class="row  mt-3">
                        <div class="col-md-6">
                            <span>Physically Handicapped:</span>
                            <input type="text" value="{{$complete_form->physically_handicapped}}" class="form-control" disabled>
                        </div>
                        <div class="col-md-6">
                            <span>Father Occupation:</span>
                            <input type="text" value="{{$complete_form->father_occupation}}" class="form-control" disabled>

                        </div>
                    </div>

                    <div class="row  mt-3">
                        <div class="col-md-6">
                            <span>Mother Occupation:</span>
                            <input type="text" value="{{$complete_form->mother_occupation	}}" class="form-control" disabled>

                        </div>
                        <div class="col-md-6">
                            <span>Family Income:</span>
                            <input type="text" value="{{$complete_form->family_income}}" class="form-control" disabled>
                        </div>
                    </div>

                    <table class="table table-bordered mt-3">
                        <thead>
                            <tr>
                                <th scope="col">S.N</th>
                                <th scope="col">Board/University</th>
                                <th scope="col" style="min-width: 120px;">Subject</th>
                                <th scope="col" style="min-width: 120px;">Marks OBT</th>
                                <th scope="col" style="min-width: 120px;">Total Marks</th>
                                <th scope="col">Upload File</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                           $data =  $complete_form->qulifications;
                           $decoded_data = json_decode($data, true); 
                            ?>
                            @foreach($decoded_data as $key=>$qalification)
                            <tr>
                                <td>{{$key+1}}</td>
                                <td>{{$qalification['board']}}</td>
                                <td>{{$qalification['subject']}}</td>
                                <td>{{$qalification['marks_obtained']}}</td>
                                <td>{{$qalification['total_marks']}}</td>
                                <td>
                                <a href="{{asset($qalification['file_url'])}}">View Document</a>




                                </td>


                            </tr>
                            @endforeach
                        </tbody>
                    </table>

                    <div class="row  mt-3">
                        <div class="col-md-6">
                            <span>Thumb print</span><br>
                        <img src="{{asset($complete_form->thumb_print)}}" alt="" style="width:90px;height:90px;">

                            
                        </div>
                        <div class="col-md-6">
                            <span>Signature </span><br>
                        <img src="{{asset($complete_form->signature)}}" alt="" style="width:90px;height:90px;">

                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <!--end::Container-->
</div>
<!--end::Entry-->
</div>
<!--end::Content-->

<script>
    $(document).ready(function() {
        $('#dtBasicExample').DataTable();
        $('.dataTables_length').addClass('bs-select');
    });
</script>
@endsection