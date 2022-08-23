<!DOCTYPE html>
<html lang="en">
<head>
    <title>Veteran Boosters</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="icon" href="{{ asset('assets/images/favicon.png')}}"/>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" />
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" type="text/css" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="{{ asset('assets/global/css/swiper.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/global/css/style.css') }}" />
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
   
    @yield('customStyle')
</head> 

<body class="pg10-body">
    <header class="pg2-bg">
        <nav class="navbar navbar-expand-lg navbar-light pg2">
          <div class="container">
            <a class="navbar-brand" href="/"><img src="{{ asset('assets/images/sitelogo.png')}}" /></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarTogglerDemo02">


              {{-- <ul class="navbar-nav">
                <li class="nav-item dropdown active">
                  <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    League of legends
                  </a>
                  <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                    <a class="dropdown-item" href="{{url('game/LeagueOfLegends')}}">ELO Boost</a>
                    <a class="dropdown-item" href="Placement-Games">Placement</a>
                    <a class="dropdown-item" href="games">Games</a> 

                  </div>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="{{url('game/overwatch')}}">Overwatch</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="{{url('game/cs-go')}}"> CS:GO</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="reviews">Reviews</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="aboutus">About us</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="jobs"> Jobs</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="login"> Login</a>
                </li>
              </ul> --}}

                  <ul class="navbar-nav">
              <li class="nav-item dropdown active">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  League of legends
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                  <a class="dropdown-item" href="{{url('game/LeagueOfLegends')}}">ELO Boost</a>
                  <a class="dropdown-item" href="{{url('Placement-Games')}}">Placement</a>
                  {{-- <a class="dropdown-item" href="games">Games</a> --}}

                </div>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="{{url('game/overwatch')}}">Overwatch</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="{{url('game/cs-go')}}"> CS:GO</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="{{url('reviews')}}">Reviews</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="{{url('aboutus')}}">About us</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="{{url('jobs')}}"> Jobs</a>
              </li>
              @if (Auth::guest())
                <li class="nav-item">
                  <a class="nav-link" href="{{url('login')}}"> Login</a>
                </li>
              @else
                <li class="nav-item">
                  <a class="nav-link" href="{{url('logout')}}"> Logout</a>
                </li>
              @endif
              {{-- <li class="nav-item">
                <a class="nav-link" href="{{url('login')}}"> Login</a>
              </li> --}}
            </ul>


            </div>
          </div>
        </nav>
        <div class="container">
          <form class="form-inline">
            <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search" />
            <button type="submit">
              <i class="fa fa-search"></i>
            </button>
          </form>
        </div>
        <div class="container">
          <div class="row">
            <div class="col"></div>
          </div>
        </div>
      </header>

    
                @yield('content')

  <footer>
      <div class="container">
        <div class="row footer-area">
          <div class="col-md-3" data-aos="fade-up">
            <h5>Recent News</h5>
            <a href="#">
              <p>5 Secrets Preventing You From Ranking Up! February ELO Boost News: Jayce in the LCS January 13, 2019</p>
            </a>
          </div>
          <div class="col-md-3" data-aos="fade-up">
            <h5>Categories</h5>
            <ul>
              <li><a href="{{url('elo-boost')}}">ELO Boost News</a></li>
              <li><a href="{{url('Placement-Games')}}">ELO Changes Reviewed</a></li>
              <li><a href="#">League of Legends News</a></li>
            </ul>
          </div>
          <div class="col-md-2" data-aos="fade-up">
            <h5>Policies</h5>
            <ul>
              <li><a href="{{url('privacy_policy')}}">Privacy Policy</a></li>
              <li><a href="{{url('terms_of_service')}}">Terms of Service</a></li>
              <li><a href="{{url('FAQ')}}">FAQ</a></li>
            </ul>
          </div>
          <div class="col-md-4" data-aos="fade-up">
            <div class="newsletter">
              <h6>Subscribe to veteranboosters via Email</h6>
              <form class="form-inline">
                <div class="input-group mb-3 subscribe-group">
                  <input type="text" class="form-control subscribe-input-text" placeholder="Email Address" aria-describedby="button-addon2" />
                  <div class="input-group-append">
                    <button class="btn subscribe-input-btn" type="button" id="button-addon2">SUBSCRIBE</button>
                  </div>
                </div>
                <!-- <input type="email" class="form-control mr-sm-2" placeholder="Email Address" />
                <button type="submit">SUBSCRIBE</button> -->
              </form>
            </div>
          </div>
        </div>
        <div class="row CopyRight">
          <div class="col-md-12">
            <p>Veteran Boosters © 2009-2020</p>
          </div>
        </div>
      </div>
    </footer>

               {{--  <footer>
                    <div class="container">
                      <div class="row footer-area">
                        <div class="col-md-3" data-aos="fade-up">
                          <h5>Recent News</h5>
                          <a href="#">
                            <p>5 Secrets Preventing You From Ranking Up! February ELO Boost News: Jayce in the LCS January 13, 2019</p>
                          </a>
                        </div>
                        <div class="col-md-3" data-aos="fade-up">
                          <h5>Categories</h5>
                          <ul>
                            <li><a href="elo-boost">ELO Boost News</a></li>
                            <li><a href="Placement-Games">ELO Changes Reviewed</a></li>
                            <li><a href="#">League of Legends News</a></li>
                          </ul>
                        </div>
                        <div class="col-md-2" data-aos="fade-up">
                          <h5>Policies</h5>
                          <ul>
                            <li><a href="privacy_policy">Privacy Policy</a></li>
                            <li><a href="terms_of_service">Terms of Service</a></li>
                            <li><a href="FAQ">FAQ</a></li>
                          </ul>
                        </div>
                        <div class="col-md-4" data-aos="fade-up">
                          <div class="newsletter">
                            <h6>Subscribe to veteranboosters via Email</h6>
                            <form class="form-inline">
                              <div class="input-group mb-3 subscribe-group">
                                <input type="text" class="form-control subscribe-input-text" placeholder="Email Address" aria-describedby="button-addon2" />
                                <div class="input-group-append">
                                  <button class="btn subscribe-input-btn" type="button" id="button-addon2">SUBSCRIBE</button>
                                </div>
                              </div>
                              <!-- <input type="email" class="form-control mr-sm-2" placeholder="Email Address" />
                              <button type="submit">SUBSCRIBE</button> -->
                            </form>
                          </div>
                        </div>
                      </div>
                      <div class="row CopyRight">
                        <div class="col-md-12">
                          <p>Veteran Boosters © 2009-2020</p>
                        </div>
                      </div>
                    </div>
                  </footer> --}}

                  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
                  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
                  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
                  <script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.min.js"></script>
              
                  <script src="{{ asset('assets/global/js/swiper.min.js') }}"></script>
                  <script src="{{ asset('assets/global/js/custom.js') }}"></script>
                  <script>
                    $(document).ready(function () {
                      // Add minus icon for collapse element which is open by default
                      $(".collapse.show").each(function () {
                        $(this).prev(".card-header").find(".fa").addClass("fa-minus").removeClass("fa-plus");
                      });
              
                      // Toggle plus minus icon on show hide of collapse element
                      $(".collapse")
                        .on("show.bs.collapse", function () {
                          $(this).prev(".card-header").find(".fa").removeClass("fa-plus").addClass("fa-minus");
                        })
                        .on("hide.bs.collapse", function () {
                          $(this).prev(".card-header").find(".fa").removeClass("fa-minus").addClass("fa-plus");
                        });
                    });
              
                    $(".slider").slick({
                      centerMode: true,
                      slidesToShow: 3,
                      centerPadding: "4px",
                      speed: 1300,
                      infinite: true,
                      touchThreshold: 1000,
                      autoplay: true,
                      autoplaySpeed: 2000,
                      responsive: [
                        {
                          breakpoint: 1500,
                          settings: {
                            slidesToShow: 3,
                          },
                        },
                        {
                          breakpoint: 991,
                          settings: {
                            slidesToShow: 2,
                          },
                        },
                        {
                          breakpoint: 767,
                          settings: {
                            slidesToShow: 1,
                            //   slidesToScroll: 2
                          },
                        },
                      ],
                    });
                  </script>
                  <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
                  <script>
                    AOS.init();
                  </script>
                   @yield('externalJsLinks')
                   <!-- END PAGE LEVEL PLUGINS -->
                   <!-- BEGIN THEME GLOBAL SCRIPTS -->
                   {{-- <script src="{{ asset('assets/layouts/global/scripts/swiper.min.js') }}"></script>  --}}
                   {{-- <script src="{{ asset('assets/layouts/global/scripts/custom.js') }}"></script>  --}}
                   <!-- END THEME LAYOUT SCRIPTS -->
                   @yield('pageCustomJS')
           
    
</body>
</html>