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
                    Admission Enquiry Form</h5>
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
                    <table id="dtBasicExample" class="table  table-bordered" cellspacing="0" width="100%">
                        <thead>
                            <tr>
                                <th>S.No.</th>
                                <th class="th-sm">Name
                                </th>
                                <th class="th-sm">Email
                                </th>
                                <th class="th-sm">Phone
                                </th>
                                <th class="th-sm">Category
                                </th>
                                <th class="th-sm">Program
                                </th>
                                <th class="th-sm">State
                                </th>
                                <th class="th-sm">City
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($enquiry_data as $key=>$data)
                            <tr>
                                <td>{{$key+1}}</td>
                                <td>{{$data->name}}</td>
                                <td>{{$data->email}}</td>
                                <td>{{$data->phone}}</td>
                                <td>{{$data->category}}</td>
                                <td>{{$data->program}}</td>
                                <td>{{bladeStateGetNameById($data->state)}}</td>
                                <td>{{bladeCityGetNameById($data->city)}}</td>
                            </tr>
                            @endforeach

                    </table>
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
    $(document).ready(function () {
$('#dtBasicExample').DataTable();
$('.dataTables_length').addClass('bs-select');
});
</script>
@endsection