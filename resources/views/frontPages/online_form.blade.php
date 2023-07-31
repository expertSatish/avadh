
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
     <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <title>Online Admission Form</title>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;600;700;900&display=swap" rel="stylesheet">
    <link href="{{ asset('template/include/css/bootstrap.min.css ')}}" rel="stylesheet" type="text/css"> 
    <link href="{{ asset('template/include/css/style.css')}}" rel="stylesheet" type="text/css">
    <script src="https://kit.fontawesome.com/20dd01c86d.js" crossorigin="anonymous"></script>
      <link rel="icon" type="image/x-icon" href="{{asset('assets/front/images/logo.png')}}">

</head>
<body>
    <div class="content-container p-0">
        <div class="bg-form">
            <div class="container">
                <div class="row">
                    <div class="col-md-10 offset-md-1">
                        <div class="online_header_form">
                            <div class="header_form_img">
                                <img src="include/images/logo.png" alt="">
                            </div>
                            <div class="online_content">
                                <h1>AVADH COLLEGE OF PHARMACY <span>(Approved by PCI, AKTU & BTE)</span></h1>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="admission_portal">
                    <h5>Online Admissions 2023-24 Portal</h5>
                </div>
                        @if(session('success'))
                        <div class="alert alert-success">
                             {{ session('success') }}
                         </div>
                        @endif
                <form method="post" action="{{route('saveOnlineFrom')}}" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-md-10 offset-md-1">
                            <div class="row mb-3">
                                <div class="col-md-9">
                                    <div class="form_heading">
                                        <h5>APPLICATION FORM FOR B.PHARM. /D.PHARM.</h5>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="row">
                                                <div class="col-3">
                                                    <div class="check_bx1">
                                                        <input type="radio" id="age1" name="course" value="B.PHARM">
                                                        <label for="age1">B.PHARM</label>
                                                    </div>
                                                </div>
                                                <div class="col-3">
                                                    <div class="check_bx">
                                                        <input type="radio" id="age2" name="course" value="D.PHARM">
                                                        <label for="age2">D.PHARM</label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form_group1">
                                        <div class="upload-group">
                                            <div class="upload-btn">
                                            <label for="">Upload Picture</label><span style="color: red;">*</span>

                                                <input type="file" class="form-control" name="user_picture" id="uploadImg" onchange="showPreview(event)">
                                                @if ($errors->has('user_picture'))
                                        <span class="text-danger">{{ $errors->first('user_picture') }}</span>
                                        @endif
                                                <label for="uploadImg">
                                                    <span id="uploadLabelText" style="color:red"></span>
                                                    <div class="uploaded_img_area" id="uploaded_img_area">
                                                        <img id="uploaded_img" alt="" style="width:150px;">
                                                    </div>
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form_group1">
                                        <label for="">Name</label><span style="color: red;">*</span>
                                        <input type="text" class="form-control" name="name" placeholder="Name">
                                        @if ($errors->has('name'))
                                        <span class="text-danger">{{ $errors->first('name') }}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form_group1">
                                        <label for="">Father’s Name</label><span style="color: red;">*</span>
                                        <input type="text" class="form-control" name="father_name" placeholder="Father’s Name">
                                        @if ($errors->has('father_name'))
                                        <span class="text-danger">{{ $errors->first('father_name') }}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form_group1">
                                        <label for="">Mother’s Name</label><span style="color: red;">*</span>
                                        <input type="text" class="form-control" name="mother_name" placeholder="Mother’s Name">
                                        @if ($errors->has('mother_name'))
                                        <span class="text-danger">{{ $errors->first('mother_name') }}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form_group1">
                                        <label for="">Date of Birth</label><span style="color: red;">*</span>
                                        <input type="date" class="form-control" name="dob" placeholder="Date of Birth" name="dob">
                                        @if ($errors->has('dob'))
                                        <span class="text-danger">{{ $errors->first('dob') }}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form_group1">
                                        <label for="">Address</label><span style="color: red;">*</span>
                                        <input type="text" class="form-control" name="address" placeholder="Address">
                                        @if ($errors->has('address'))
                                        <span class="text-danger">{{ $errors->first('address') }}</span>
                                        @endif

                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form_group1">
                                        <label for="">Mobile / Telephone No</label><span style="color: red;">*</span>
                                        <input type="number" class="form-control" name="mobile" placeholder="Mobile / Telephone No">
                                        @if ($errors->has('mobile'))
                                        <span class="text-danger">{{ $errors->first('mobile') }}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form_group1">
                                        <label for="">Guardian Mobile No</label><span style="color: red;">*</span>
                                        <input type="number`" class="form-control" name="guardian_phone" placeholder="Guardian Mobile No">
                                        @if ($errors->has('guardian_phone'))
                                        <span class="text-danger">{{ $errors->first('guardian_phone') }}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form_group1">
                                        <label for="">Category</label><span style="color: red;">*</span>
                                        <select class="form-control" name="catagory" id="categery">
                                            <option>Select</option>
                                            <option value="Gen">Gen</option>
                                            <option value="O.B.C">O.B.C</option>
                                            <option value="S.C.">S.C.</option>
                                            <option value="S.T.">S.T.</option>
                                        </select>
                                        @if ($errors->has('catagory'))
                                        <span class="text-danger">{{ $errors->first('catagory') }}</span>
                                        @endif
                                    </div>

                                </div>
                                <div class="col-md-6">
                                    <div class="form_group1">
                                        <label for="">Physically Handicapped</label><span style="color: red;">*</span>
                                        <select class="form-control" name="physically_handicapped" id="categery">
                                            <option>Select</option>
                                            <option value="Yes">Yes</option>
                                            <option value="No">No</option>
                                        </select>
                                        @if ($errors->has('physically_handicapped'))
                                        <span class="text-danger">{{ $errors->first('physically_handicapped') }}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form_group1">
                                        <label for="">Father’s occupation</label><span style="color: red;">*</span>
                                        <input type="text" class="form-control" name="father_occupation" placeholder="Father’s occupation">
                                        @if ($errors->has('father_occupation'))
                                        <span class="text-danger">{{ $errors->first('father_occupation') }}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form_group1">
                                        <label for="">Mother’s occupation</label><span style="color: red;">*</span>
                                        <input type="text" class="form-control" name="mother_occupation" placeholder="Mother’s occupation">
                                        @if ($errors->has('mother_occupation'))
                                        <span class="text-danger">{{ $errors->first('mother_occupation') }}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form_group1">
                                        <label for="">Family income (annual)</label><span style="color: red;">*</span>
                                        <select class="form-control" name="family_income" id="categery">
                                            <option>Family income (annual)</option>
                                            <option value="0-50 (Thousand) ">0-50 (Thousand) </option>
                                            <option value="0.50-1 (Lakhs)">0.50-1 (Lakhs)</option>
                                            <option value="01-2.5 (Lakhs)">01-2.5 (Lakhs)</option>
                                            <option value="2.5-05 (Lakhs)">2.5-05 (Lakhs)</option>
                                            <option value="05-10 (Lakhs)">05-10 (Lakhs)</option>
                                        </select>
                                        @if ($errors->has('family_income'))
                                        <span class="text-danger">{{ $errors->first('family_income') }}</span>
                                        @endif
                                    </div>
                                </div>
                                <h5 class="heading-form">Qualiication details:</h5>
                                <div class="col-md-12 mb-3">
                                    <div class="table-responsive mb-md-5">
                                        <table class="table table-bordered">
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
                                                <tr>
                                                    <th scope="row">1</th>
                                                    <td class="p-0">
                                                        <div class="form_group2">
                                                            <input type="text" class="form-control" name="qualification[1][board]">
                                                        </div>
                                                    </td>
                                                    <td class="p-0">
                                                        <div class="form_group2">
                                                            <input type="text" class="form-control" name="qualification[1][subject]">
                                                        </div>
                                                    </td>
                                                    <td class="p-0">
                                                        <div class="form_group2">
                                                            <input type="number" class="form-control" name="qualification[1][marks_obtained]">
                                                        </div>
                                                    </td>
                                                    <td class="p-0">
                                                        <div class="form_group2">
                                                            <input type="number" class="form-control" name="qualification[1][total_marks]">
                                                        </div>
                                                    </td>
                                                    <td class="p-0">
                                                        <div class="form_group2">
                                                           
                                                            <input  type="file" class="form-control" accept="application/pdf" id="inputFile" name="qualification[1][uploadfile]">
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th scope="row">2</th>
                                                    <td class="p-0">
                                                        <div class="form_group2">
                                                            <input type="text" class="form-control" name="qualification[2][board]">
                                                        </div>
                                                    </td>
                                                    <td class="p-0">
                                                        <div class="form_group2">
                                                            <input type="text" class="form-control" name="qualification[2][subject]">
                                                        </div>
                                                    </td>
                                                    <td class="p-0">
                                                        <div class="form_group2">
                                                            <input type="number" class="form-control" name="qualification[2][marks_obtained]">
                                                        </div>
                                                    </td>
                                                    <td class="p-0">
                                                        <div class="form_group2">
                                                            <input type="number" class="form-control" name="qualification[2][total_marks]">
                                                        </div>
                                                    </td>
                                                    <td class="p-0">
                                                        <div class="form_group2">
                                                            <input  type="file" class="form-control" accept="application/pdf" id="inputFile" name="qualification[2][uploadfile]">
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th scope="row">3</th>
                                                    <td class="p-0">
                                                        <div class="form_group2">
                                                            <input type="text" class="form-control" name="qualification[3][board]">
                                                        </div>
                                                    </td>
                                                    <td class="p-0">
                                                        <div class="form_group2">
                                                            <input type="text" class="form-control" name="qualification[3][subject]">
                                                        </div>
                                                    </td>
                                                    <td class="p-0">
                                                        <div class="form_group2">
                                                            <input type="number" class="form-control" name="qualification[3][marks_obtained]">
                                                        </div>
                                                    </td>
                                                    <td class="p-0">
                                                        <div class="form_group2">
                                                            <input type="number" class="form-control" name="qualification[3][total_marks]">
                                                        </div>
                                                    </td>
                                                    <td class="p-0">
                                                        <div class="form_group2">
                                                            <input  type="file" class="form-control" accept="application/pdf"  name="qualification[3][uploadfile]">
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th scope="row">4</th>
                                                    <td class="p-0">
                                                        <div class="form_group2">
                                                            <input type="text" class="form-control" name="qualification[4][board]">
                                                        </div>
                                                    </td>
                                                    <td class="p-0">
                                                        <div class="form_group2">
                                                            <input type="text" class="form-control" name="qualification[4][subject]">
                                                        </div>
                                                    </td>
                                                    <td class="p-0">
                                                        <div class="form_group2">
                                                            <input type="number" class="form-control" name="qualification[4][marks_obtained]">
                                                        </div>
                                                    </td>
                                                    <td class="p-0">
                                                        <div class="form_group2">
                                                            <input type="number" class="form-control" name="qualification[4][total_marks]">
                                                        </div>
                                                    </td>
                                                    <td class="p-0">
                                                        <div class="form_group2">
                                                            <input  type="file"  class="form-control" accept="application/pdf" id="inputFile" name="qualification[4][uploadfile]">
                                                        </div>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form_group1">
                                        <div class="upload-group">
                                            <div class="upload-btn">
                                                <label for="">Thumbprint of applicant</label><span style="color: red;">*</span>
                                                <input type="file" class="form-control" name="thumb_print" id="thumbprint" onchange="thumbprints(event)">
                                                <label for="uploadImg_one">
                                                    <span id="uploadLabelText_onethumb" style="color: red;"></span>
                                                    <div class="uploaded_img_area_onethumb" id="uploaded_img_area_onethumb">
                                                        <img id="uploaded_img_onethumb" alt="" style="width: 150px;height:120px;">
                                                    </div>
                                                </label>
                                            </div>
                                            @if ($errors->has('thumb_print'))
                                            <span class="text-danger">{{ $errors->first('thumb_print') }}</span>
                                            @endif

                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form_group1">
                                        <div class="upload-group">
                                            <div class="upload-btn">
                                                <label for=""> Signature of applicant</label> <span style="color: red;">*</span>
                                                <input type="file" class="form-control" name="user_sign" id="thumbprint" onchange="userSignupload(event)">
                                                <label for="uploadImgtwo">
                                                    <span id="uploadLabelTextsign" style="color: red;"></span>
                                                    <div class="uploaded_img_area_onesign" id="uploaded_img_area_onesign">
                                                        <img id="uploaded_img_onesign" alt="" style="width: 150px;height:120px;">
                                                    </div>
                                                </label>
                                            </div>
                                        </div>
                                        @if ($errors->has('user_sign'))
                                        <span class="text-danger">{{ $errors->first('user_sign') }}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="btn-sub">
                                        <button type="submit" class="btn-submit">Submit</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    
     <script>
        function showPreview(event) {

            const fileInput = event.target;
            const file = fileInput.files[0];
            const uploadLabelText = document.getElementById("uploadLabelText");
            const uploadedImage = document.getElementById("uploaded_img");
            const uploadedImageArea = document.getElementById("uploaded_img_area");

            if (file) {

                if (file.type.startsWith("image/")) {

                    if (file.size >= 25 * 1024 && file.size <= 50 * 1024) {
                        const reader = new FileReader();
                        reader.onload = function(e) {
                            uploadedImage.src = e.target.result;
                            uploadedImageArea.style.display = "block";
                            uploadLabelText.textContent = file.name;
                        };
                        reader.readAsDataURL(file);
                    } else {
                        uploadedImageArea.style.display = "none";
                        uploadLabelText.textContent = "Please select an image between 25kb and 50kb in size.";
                        fileInput.value = "";
                    }
                } else {

                    uploadedImageArea.style.display = "none";
                    uploadLabelText.textContent = "Invalid file type. Please select an image.";
                    fileInput.value = "";
                }
            } else {
                uploadedImageArea.style.display = "none";
                uploadLabelText.textContent = "Click to upload image";
            }
        }


        function thumbprints(event) {
            const fileInput = event.target;
            const file = fileInput.files[0];
            const uploadLabelText = document.getElementById("uploadLabelText_onethumb");
            const uploadedImage = document.getElementById("uploaded_img_onethumb");
            const uploadedImageArea = document.getElementById("uploaded_img_area_onethumb");

            if (file) {
                if (file.type.startsWith("image/")) {
                    if (file.size >= 20 * 1024 && file.size <= 50 * 1024) {
                        const reader = new FileReader();
                        reader.onload = function(e) {
                            uploadedImage.src = e.target.result;
                            uploadedImageArea.style.display = "block";
                            uploadLabelText.textContent = file.name;
                        };
                        reader.readAsDataURL(file);
                    } else {
                        uploadedImageArea.style.display = "none";
                        uploadLabelText.textContent = "Please select an image between 20KB and 50KB in size.";
                        fileInput.value = "";
                    }
                } else {
                    uploadedImageArea.style.display = "none";
                    uploadLabelText.textContent = "Invalid file type. Please select an image.";
                    fileInput.value = "";
                }
            } else {
                uploadedImageArea.style.display = "none";
                uploadLabelText.textContent = "Click to upload image";
            }
        }

        function userSignupload(event) {
            const fileInput = event.target;
            const file = fileInput.files[0];
            const uploadLabelText = document.getElementById("uploadLabelTextsign");
            const uploadedImage = document.getElementById("uploaded_img_onesign");
            const uploadedImageArea = document.getElementById("uploaded_img_area_onesign");

            if (file) {
                if (file.type.startsWith("image/")) {
                    if (file.size >= 20 * 1024 && file.size <= 50 * 1024) {
                        const reader = new FileReader();
                        reader.onload = function(e) {
                            uploadedImage.src = e.target.result;
                            uploadedImageArea.style.display = "block";
                            uploadLabelText.textContent = file.name;
                        };
                        reader.readAsDataURL(file);
                    } else {
                        uploadedImageArea.style.display = "none";
                        uploadLabelText.textContent = "Please select an image between 20KB and 50KB in size.";
                        fileInput.value = "";
                    }
                } else {
                    uploadedImageArea.style.display = "none";
                    uploadLabelText.textContent = "Invalid file type. Please select an image.";
                    fileInput.value = "";
                }
            } else {
                uploadedImageArea.style.display = "none";
                uploadLabelText.textContent = "Click to upload image";
            }

        }
    </script>
    <script src="{{ asset('template/include/js/jquery.min.js')}}"></script>
    <script src="{{ asset('template/include/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('template/include/js/main.js ') }}"></script>
    <script src="{{ asset('template/include/js/theme_fornt_change.js ') }}"></script>

    <script type="text/javascript" src="https://translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>
    <script>
        function googleTranslateElementInit() {
           new google.translate.TranslateElement({pageLanguage: 'en', includedLanguages : 'en,hi'}, 'google_translate_element');
        }
    </script> 
    <script src="{{ asset('template/include/js/custom.js ') }}"></script>
</body>