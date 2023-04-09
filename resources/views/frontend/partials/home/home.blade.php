@extends('frontend.master.master')
@section('main_frontend')
    @include('frontend.layouts.errorAndSuccessMessage')
    {{-- slider --}}
    <div class="slider-detail">
        <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
            <ol class="carousel-indicators">
                <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>

            </ol>
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img class="d-block w-100" src="{{ asset('frontend/assets/images/slider/slide-03.jpg') }}"
                        alt="First slide">
                    <div class="carousel-caption d-none d-md-block">
                        <h5 class=" bounceInDown" style="color: black">DONATE BLOOD AND GET REAL BLESSINGS</h5>
                        <p class=" bounceInLeft" style="color: black">Blood is the most precious gift that anyone can give to another person.
                            Donating blood not only saves the life also save donor's lives..
    
                            </p>
                            <div class="text-center mt-2"> {{-- <a href="{{ route('donar.register') }}"><button class="btn btn-primary w-50 mb-1" type="submit" tex align:center>Donate Now</button></a> --}}
                                <a href="{{ route('donar.register') }}" class="btn btn-primary">Become a Blood donor</a>
                               </div>

                        {{-- <div class=" vbh">

                            <div class="btn btn-success  bounceInUp"> Book Appointment </div>
                            <div class="btn btn-success  bounceInUp"> Contact US </div>
                        </div> --}}
                    </div>
                </div>

                <div class="carousel-item">
                    <img class="d-block w-100" src="{{ asset('frontend/assets/images/slider/slide-02.jpg') }}"
                        alt="Third slide">
                    <div class="carousel-caption vdg-cur d-none d-md-block">
                        <h5 style="color:rgb(14, 13, 14)" bounceInDown">DONATE BLOOD AND GET REAL BLESSINGS</h5>
                        <p class=" bounceInLeft"style="color: black">Blood is the most precious gift that anyone can give to another person.
                            Donating blood not only saves the life also save donor's lives.</p>
                           <div class="text-center mt-2"> {{-- <a href="{{ route('donar.register') }}"><button class="btn btn-primary w-50 mb-1" type="submit" tex align:center>Donate Now</button></a> --}}
                            <a href="{{ route('donar.register') }}" class="btn btn-primary">Become a Blood donor</a>
                           </div>
                        {{-- <div class=" vbh">


                            <div class="btn btn-danger  bounceInUp"> Donate Now </div>
                            <div class="btn btn-danger  bounceInUp"> Contact US </div>
                        </div> --}}
                    </div>
                </div>

            </div>
            <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>
    </div>


    <!--*************** About Us Starts Here ***************-->
    <section id="about" class="contianer-fluid about-us">
        <div class="container">
            <div class="row session-title">
                <h2 style ="color:brown">About Us</h2>
                <p style ="color:rgb(19, 18, 18)">We are world largest and trustful blood donation center. We have been working since 1973 with a prestigious vision to helping patient to provide blood. 
                </p>
            </div>
            <div class="row">
                <div class="col-md-6 text">
                    <h2 style="color:brown">About Blood Doners</h2>
                    <br>
                    <p>Blood is the most significant gift of life that a person can give to others.</p>
                    <br>
                    <p> 
                        
                Donated blood is always life saving for people who have lost a significant amount of blood due to various reasons like serious injuries, surgical procedures, medical conditions etc. Therefore, all time availability of blood in blood banks has become a prime concern for the society.</p>
                <br>
                <br>
                <p>
                    As blood can be stored for shorter period of duration, there is a constant need of blood donation to have an adequate and safe supply of all blood groups in time of need. Each donor contributes significantly to meet the challenge of accessibility and affordability to patients by making it available whenever and wherever wanted.
                </p>
                <br>
                <p>Not only it helps saving lives, but also plays a vital role in improving health of a donor.</p>
                <br>
                <p>Blood should be accepted only from voluntary, non-remunerated, low risk, safe and healthy donors. Replacement of donors should be phased out</p>
                </div>
                <div class="col-md-6 image">
                    <img src="{{ asset('frontend/assets/images/about.jpg') }}" alt="">
                </div>
            </div>
        </div>
    </section>



    <!-- ################# Gallery Start Here #######################--->

    <div id="gallery" class="gallery">
        <div class="container">
            <div class="row session-title">
                <h2 style="color:brown">Checkout Our Gallery</h2>
            </div>
            <div class="row mb-4">
                <div class="col-3">
                    <a href="http://">
                        <img src="{{ asset('frontend/assets/images/gallery/g9.jpg') }}">
                    </a>
                </div>
                <div class="col-3">
                    <a href="http://">
                        <img src="{{ asset('frontend/assets/images/gallery/g2.jpg') }}">
                    </a>
                </div>
                <div class="col-3">
                    <a href="http://">
                        <img src="{{ asset('frontend/assets/images/gallery/g3.jpg') }}">
                    </a>
                </div>
                <div class="col-3">
                    <a href="http://">
                        <img src="{{ asset('frontend/assets/images/gallery/g4.jpg') }}">
                    </a>
                </div>
            </div>
            <div class="row">
                <div class="col-3">
                    <a href="http://">
                        <img src="{{ asset('frontend/assets/images/gallery/g5.jpg') }}">
                    </a>
                </div>
                <div class="col-3">
                    <a href="http://">
                        <img src="{{ asset('frontend/assets/images/gallery/g6.jpg') }}">
                    </a>
                </div>
                <div class="col-3">
                    <a href="http://">
                        <img src="{{ asset('frontend/assets/images/gallery/g7.jpg') }}">
                    </a>
                </div>
                <div class="col-3">
                    <a href="http://">
                        <img src="{{ asset('frontend/assets/images/gallery/g8.jpg') }}">
                    </a>
                </div>
            </div>
        </div>
    </div>



    <!-- ################# Donation Process Start Here #######################--->

    <section id="process" class="donation-care">
        <div class="container">
            <div class="row session-title" style="text-align:center">
                <h2 style="color:brown">Donation Process</h2>
                
                <p style="text-align:center" >The donation process from the time you arrive center until the time you leave</p>
            
            <div class="row">
                <div class="col-md-3 col-sm-6 vd">
                    <div class="bkjiu">
                        <img src="{{ asset('frontend/assets/images/gallery/g1.jpg') }}" alt="">
                        <h4 style ="color:rgb(19, 18, 18)" ><b>1 - </b>REGISTRATION</h4>
                        <p style ="color:rgb(19, 18, 18)">You need to complete a very simple registration form. Which contains all required contact information to enter in the donation process</p>
                        {{-- <button class="btn btn-sm btn-danger">Readmore <i class="fas fa-arrow-right"></i></button> --}}
                    </div>
                </div>
                <div class="col-md-3 col-sm-6 vd">
                    <div class="bkjiu">
                        <img src="{{ asset('frontend/assets/images/gallery/g2.jpg') }}" alt="">
                        <h4 style ="color:rgb(19, 18, 18)"><b>2 - </b>SCREENING</h4>
                        <p style ="color:rgb(19, 18, 18)">A drop of blood from your finger will take for simple test to ensure that your blood iron levels are proper enough for donation process</p>
                        {{-- <button class="btn btn-sm btn-danger">Readmore <i class="fas fa-arrow-right"></i></button> --}}
                    </div>
                </div>
                <div class="col-md-3 col-sm-6 vd">
                    <div class="bkjiu">
                        <img src="{{ asset('frontend/assets/images/gallery/g3.jpg') }}" alt="">
                        <h4 style ="color:rgb(19, 18, 18)"><b>3 - </b>DONATION</h4>
                        <p style ="color:rgb(19, 18, 18)">After ensuring and passed screening test successfully you will be directed to a donor bed for donation. It will take only 6-10 minutes</p>
                        {{-- <button class="btn btn-sm btn-danger">Readmore <i class="fas fa-arrow-right"></i></button> --}}
                    </div>
                </div>
                <div class="col-md-3 col-sm-6 vd">
                    <div class="bkjiu">
                        <img src="{{ asset('frontend/assets/images/gallery/g4.jpg') }}" alt="">
                        <h4  style ="color:rgb(19, 18, 18)"><b>4 - </b>SAVE LIFE</h4>
                        <p style ="color:rgb(19, 18, 18)">Blood is the most precious gift that anyone can give to another person.
                            Donating blood not only saves the life also save donor's lives.</p>
                        {{-- <button class="btn btn-sm btn-danger">Readmore <i class="fas fa-arrow-right"></i></button> --}}
                    </div>
                </div>
            </div>


        </div>
    </section>




    <!--################### Our Blog Starts Here #######################--->
    <div id="blog" class="blog-container contaienr-fluid">
        <div class="container">
            <div class="session-title row">
                <h2 style="color:brown">Latest Blog</h2>
                <p style="color: black">Latest news and statements regarding giving blood, blood processing and supply.
             </p>
            </div>
            <div class="row news-row">
                <div class="col-md-6">
                    <div class="news-card">
                        <div class="image">
                            <img src="assets/images/blog/blog_01.jpg" alt="">
                        </div>
                        <div class="detail">
                        <h2 style="color: rgb(184, 21, 21)">Blood Connects Us All in a Soul</h2>
                    <p style="color: black">In many countries, demand exceeds supply, 
                        and blood services face the challenge of making blood available for patient.
                            </p>
                            
                             <p class="footp">
                                <i class="fa fa-clock-o"></i>22 Comments <span>/</span>
                                Blog Design <span>/</span>
                                Read More
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="news-card">
                        <div class="image">
                            <img src="assets/images/blog/blog_02.jpg" alt="">
                        </div>
                        <div class="detail">
                            <h2 style="color: brown">Give Blood and Save three Live</h2>
                            <p style="color: black">To save a life, you don’t need to use muscle. By donating just one unit of blood, you can save three lives or even several lives.</p>
                            <p class="footp">
                                27 Comments <span>/</span>
                                Blog Design <span>/</span>
                                Read More
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="news-card">
                        <div class="image">
                            <img src="assets/images/blog/blog_03.jpg" alt="">
                        </div>
                        <div class="detail">
                            <h2 style="color: brown">Why Should I donate Blood ?</h2>
                            <p style="color: black">Blood is the most precious gift that anyone can give to another person.Donating blood not only saves the life also donors. </p>
                            <p class="footp">
                                27 Comments <span>/</span>
                                Blog Design <span>/</span>
                                Read More
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="news-card">
                        <div class="image">
                            <img src="assets/images/blog/blog_04.jpg" alt="">
                        </div>
                        <div class="detail">
                            <h2 style="color: brown"> Be Grateful & Donate Blood</h2>
                            <p style="color: black">Not only it helps saving lives, but also plays a vital role in improving health of a donor.</p>
                            <p class="footp">
                                27 Comments <span>/</span>
                                Blog Design <span>/</span>
                                Read More
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
