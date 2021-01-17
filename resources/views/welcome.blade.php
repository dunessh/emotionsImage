<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Template Mo">
    <link href="https://fonts.googleapis.com/css?family=Roboto:100,300,400,500,700,900" rel="stylesheet">

    <title>Emotion Images</title>
<!--

ART FACTORY

https://templatemo.com/tm-537-art-factory

-->
    <!-- Additional CSS Files -->
    <link rel="stylesheet" type="text/css" href="{{ asset('asset_homepage/css/bootstrap.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('asset_homepage/css/font-awesome.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('asset_homepage/css/templatemo-art-factory.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('asset_homepage/css/owl-carousel.css') }}">

    </head>
    
    <body>
    
    <!-- ** Preloader Start ** -->
    <div id="preloader">
        <div class="jumper">
            <div></div>
            <div></div>
            <div></div>
        </div>
    </div>  
    <!-- ** Preloader End ** -->
    
    
    <!-- ** Header Area Start ** -->
    <header class="header-area header-sticky">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <nav class="main-nav">
                        <!-- ** Logo Start ** -->
                        <a href="#" class="logo">Twitter Emotion Analysis</a>
                        <!-- ** Logo End ** -->
                        <!-- ** Menu Start ** -->
                        <ul class="nav">
                            <li class="scroll-to-section"><a class='btn btn-xs btn-info'   href="{{ url('login') }}">Login</a></li>
                        </ul>
                        <a class='menu-trigger'>
                            <span>Menu</span>
                        </a>
                        <!-- ** Menu End ** -->
                    </nav>
                </div>
            </div>
        </div>
    </header>
    <!-- ** Header Area End ** -->


    <!-- ** Welcome Area Start ** -->
    <div class="welcome-area" id="welcome">

        <!-- ** Header Text Start ** -->
        <div class="header-text">
            <div class="container">
                <div class="row">
                    <div class="left-text col-lg-6 col-md-6 col-sm-12 col-xs-12" data-scroll-reveal="enter left move 30px over 0.6s after 0.4s">
                        <h1>A Twitter Emotion Analysis free to use<strong> for YOU</strong></h1>
                        <p>A platform for Twitter user's to check the emotions (Happy ,Sad or Neutral) that are portrayed 
                            in the <strong>IMAGES</strong> that they have posted or retweeted.</p>
                        <a class='btn btn-lg btn-block btn-info'   href="{{ url('login') }}">Login with Twitter</a></li>
                    </div>

                    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12" data-scroll-reveal="enter right move 30px over 0.6s after 0.4s">
                        <img src="{{ asset('asset_homepage/images/slider-icon.png') }}" class="rounded img-fluid d-block mx-auto" alt="First Vector Graphic">
                    </div>
                </div>
            </div>
        </div>
        <!-- ** Header Text End ** -->
    </div>
    <!-- ** Welcome Area End ** -->


    <!-- ** Features Big Item Start ** -->
    <section class="section" id="about">
        <div class="container">
            <div class="row">
                <div class="col-lg-7 col-md-12 col-sm-12" data-scroll-reveal="enter left move 30px over 0.6s after 0.4s">
                    <img src="{{ asset('asset_homepage/images/left-image.png') }}" class="rounded img-fluid d-block mx-auto" alt="App">
                </div>
                <div class="right-text col-lg-5 col-md-12 col-sm-12 mobile-top-fix">
                    <div class="left-heading">
                        <h5>Clean dataset,preprocess Images and train models</h5>
                    </div>
                    <div class="left-text">
                        <p> Using several machine learning models , we are able to detect emotions present in an image.The models are trained using 
                            our own dataset and images used are cleaned for training and testing.
                        </p>
                        
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="hr"></div>
                </div>
            </div>
        </div>
    </section>
    <!-- ** Features Big Item End ** -->


    <!-- ** Features Big Item Start ** -->
    <section class="section" id="about2">
        <div class="container">
            <div class="row">
                <div class="left-text col-lg-5 col-md-12 col-sm-12 mobile-bottom-fix">
                    <div class="left-heading">
                        <h5>System Functionallity</h5>
                    </div>
                    <p>Provide a platform for user's to see the emotions shown by their images using our machine learning models trained by our dataset.</p>
                    <ul>
                        <li>
                            <img src="{{ asset('asset_homepage/images/about-icon-01.png') }}" alt="">
                            <div class="text">
                                <h6>Detect Faces</h6>
                                <p>The system will perform machine learning on an image and detect the EMOTION portrayed by the faces found in the image.</p>
                            </div>
                        </li>
                        <li>
                            <img src="{{ asset('asset_homepage/images/about-icon-02.png') }}" alt="">
                            <div class="text">
                                <h6>Detect Objects</h6>
                                <p>The machine learning that we trained will detect any objects that are present and will detect the EMOTION of the objects based on our dataset.</p>
                            </div>
                        </li>
                        <li>
                            <img src="{{ asset('asset_homepage/images/about-icon-03.png') }}" alt="">
                            <div class="text">
                                <h6>Detect Colours</h6>
                                <p>The system will use an algorithm to calculate the emotions value of the colours present in the image.</p>
                            </div>
                        </li>
                    </ul>
                </div>
                <div class="right-image col-lg-7 col-md-12 col-sm-12 mobile-bottom-fix-big" data-scroll-reveal="enter right move 30px over 0.6s after 0.4s">
                    <img src="{{ asset('asset_homepage/images/right-image.png') }}" class="rounded img-fluid d-block mx-auto" alt="App">
                </div>
            </div>
        </div>
    </section>
    <!-- ** Features Big Item End ** -->




      


    
    <!-- ** Footer Start ** -->
    <footer>
        <div class="container">
            <div class="row">
                <div class="col-lg-7 col-md-12 col-sm-12">
                    <p class="copyright">Copyright &copy; 2020 Emotion Images 
                
                
                </div>
                
            </div>
        </div>
    </footer>
    
    <!-- jQuery -->
    <script src="{{ asset('asset_homepage/js/jquery-2.1.0.min.js') }}"></script>

    <!-- Bootstrap -->
    <script src="{{ asset('asset_homepage/js/popper.js') }}"></script>
    <script src="{{ asset('asset_homepage/js/bootstrap.min.js') }}"></script>

    <!-- Plugins -->
    <script src="{{ asset('asset_homepage/js/owl-carousel.js') }}"></script>
    <script src="{{ asset('asset_homepage/js/scrollreveal.min.js') }}"></script>
    <script src="{{ asset('asset_homepage/js/waypoints.min.js') }}"></script>
    <script src="{{ asset('asset_homepage/js/jquery.counterup.min.js') }}"></script>
    <script src="{{ asset('asset_homepage/js/imgfix.min.js') }}"></script> 
    
    <!-- Global Init -->
    <script src="{{ asset('asset_homepage/js/custom.js') }}"></script>

  </body>
</html>