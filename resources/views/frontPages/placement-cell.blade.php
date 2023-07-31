@extends('front_layouts/layout')
@extends('front_layouts/header')
@section('contentSection')
    <!--============================== Content Start ==============================-->
    <div class="content-container">
        <div class="container">            
            <div class="main-heqading">
                <h3>Placement Cell</h3>
                <p>Student careers are significantly shaped by the ACOP Placement Cell. The goal is to develop innovative methods for preparing students for career opportunities and to bring the brightest business leaders to our campus.</p>
                <p>The placement cell's main objective is to place students in elite businesses. The placement cell acts as a link between the educational community and business. Additionally, it actively contributes to the teaching and growth of students' technical and soft skills.</p>
                <p>Through the promotion of knowledge, entrepreneurship, and creativity, we prepare students for competition. We think that these advantages provide us the edge we need to compete successfully in a market that is always changing.</p>
            </div>
            <ul class="about-content">
                <h5>OBJECTIVES: </h5>
                <li>To plan technical lectures, workshops, and training sessions for businesses.</li>
                <li>To determine the students' fundamental competencies.</li>
                <li>To increase students' interest in business methods and entrepreneurship.</li>
                <li>To enhance their whole personality in terms of goal-setting, communication, and career planning.</li>
                <li>To encourage students to pursue further education and to assist them in preparing for competitive tests.</li>
                <li>To contact reputable businesses and organize campus interviews for final-year students.</li>
                <li>To place as many students as possible through campus interviews with reputable businesses.</li>
            </ul> 
            <div class="about-content">
                <h5>PLACEMENT CELL MEMBERS</h5>
            </div>
            <div class="table-responsive mb-md-3">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th scope="col">S.N</th>
                            <th scope="col" style="min-width: 250px;">NAME</th>
                            <th scope="col" style="min-width: 250px;">POSITION</th>
                            <th scope="col" style="min-width: 200px;">CONTACT NUMBER</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th scope="row">1</th>
                            <td>
                                Dr. SUSHEEL KUMAR DUBEY
                            </td>   
                            <td>
                               PLACEMENT OFFICER
                            </td>
                            <td>
                               +919760606987
                            </td>
                        </tr>
                        <tr>
                            <th scope="row">2</th>
                            <td>
                                Mr. ABDUL RAUF
                            </td>   
                            <td>
                               ADVISER
                            </td>
                            <td>
                               +919795722545
                            </td>
                        </tr>
                        <tr>
                            <th scope="row">3</th>
                            <td>
                                Mr. AAMIR ANWAR
                            </td>   
                            <td>
                               GUIDANCE OFFICER
                            </td>
                            <td>
                               +917905838104
                            </td>
                        </tr>
                        <tr>
                            <th scope="row">4</th>
                            <td>
                                Ms. ISHANA CHAND
                            </td>   
                            <td>
                               COUNSELLOR
                            </td>
                            <td>
                               +917318322171
                            </td>
                        </tr>
                        <tr>
                            <th scope="row">5</th>
                            <td>
                                Mr. MD. ARMAAN ARIF
                            </td>   
                            <td>
                               COUNSELLOR
                            </td>
                            <td>
                               +917080308039
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!--============================== Content Start ==============================-->
    <div class="content-container partner-container pt-0">
        <div class="container">            
            <div class="main-heqading text-center">
                <h3>For Recruiters</h3>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <ul class="partner-list _partner_slider pb-0">
                        <li class="partner-item">
                            <div class="partner-logo">
                                <div class="partner-logo-1">
                                    <img src="{{asset('assets/include/images/partner-logo.png')}}" alt="">
                                </div>
                            </div>
                        </li>
                        <li class="partner-item">
                            <div class="partner-logo">
                                <div class="partner-logo-1">
                                    <img src="{{asset('assets/include/images/partner-logo1.png')}}" alt="">
                                </div>
                            </div>
                        </li>
                        <li class="partner-item">
                            <div class="partner-logo">
                                <div class="partner-logo-1">
                                    <img src="{{asset('assets/include/images/partner-logo2.png')}}" alt="">
                                </div>
                            </div>
                        </li>
                        <li class="partner-item">
                            <div class="partner-logo">
                                <div class="partner-logo-1">
                                    <img src="{{asset('assets/include/images/partner-logo3.png')}}" alt="">
                                </div>
                            </div>
                        </li>
                        <li class="partner-item">
                            <div class="partner-logo">
                                <div class="partner-logo-1">
                                    <img src="{{asset('assets/include/images/partner-logo4.png')}}" alt="">
                                </div>
                            </div>
                        </li>
                        <li class="partner-item">
                            <div class="partner-logo">
                                <div class="partner-logo-1">
                                    <img src="{{asset('assets/include/images/partner-logo5.png')}}" alt="">
                                </div>
                            </div>
                        </li>
                        <li class="partner-item">
                            <div class="partner-logo">
                                <div class="partner-logo-1">
                                    <img src="{{asset('assets/include/images/partner-logo6.png')}}" alt="">
                                </div>
                            </div>
                        </li>
                        <li class="partner-item">
                            <div class="partner-logo">
                                <div class="partner-logo-1">
                                    <img src="{{asset('assets/include/images/partner-logo7.png')}}" alt="">
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    @endsection