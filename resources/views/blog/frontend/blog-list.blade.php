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
  </head>
  <body>
    <header>
      <nav class="navbar navbar-expand-lg navbar-light">
        <div class="container">
          <a class="navbar-brand" href="/"><img src="{{ asset('assets/images/sitelogo.png')}}"  /></a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
            <ul class="navbar-nav">
              <li class="nav-item dropdown active">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  League of legends
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                  <a class="dropdown-item" href="elo-boost">ELO Boost</a>
                  <a class="dropdown-item" href="Placement-Games">Placement</a>
                  <a class="dropdown-item" href="games">Games</a>

                </div>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="game/overwatch">Overwatch</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="game/cs-go"> CS:GO</a>
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
                <a class="nav-link" href="/login"> Login</a>
              </li>
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
          <div class="col-lg-9 col-md-12">
            <div class="banner-section">
              <h1>THE EXPERT <span>ELO</span> BOOSTERS!</h1>
              <h3>We take pride in offering rapid, safe, and affordable ELO Boosting. Choose the best!</h3>
              <div class="row content-items">
                <div class="col-md-4">
                  <h4>Expert Boosters</h4>
                  <p>Escape ELO Hell with our veteran Diamond 1 and above players who are guaranteed to have you climbing the ladder in no time!</p>
                </div>
                <div class="col-md-4">
                  <h4>Customer Service</h4>
                  <p>VeteranBoosters.com puts our customers first, you can easily manager your order via our order tracking!</p>
                </div>
                <div class="col-md-4">
                  <h4>Safe ELO Boosting</h4>
                  <p>It’s hard finding a trust worthy site, with our numerous reviews you can rest assured that we will keep your account safe!</p>
                </div>
              </div>
              <div class="row">
                <div class="col-md-12">
                  <a href="#" class="banner-btn buyboost">Buy Boost</a>
                  <a href="aboutus" class="banner-btn">About Us</a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </header>
    <section id="news">
      <div class="container">
        {{-- <h3 class="main-heading" data-aos="fade-up">Latest News</h3> --}}
        <div class="row news-section">
          {{-- <div class="col-lg-9 col-md-12">
            <div class="swiper-container">
              <div class="swiper-wrapper">
           

                @foreach($news as $new)
                  <div class="swiper-slide">
                    <div class="featurephoto" data-aos="fade-up">
                      <img src='/storage/NewsImages/{{$new->image}}'  class="img-responsive" />
                    </div>
                    <div class="news-content">
                      <h5 data-aos="fade-up">{{ $new->title }}</h5>
                      <p data-aos="fade-up">{{ $new->description }}</p>
                    </div>
                  </div>
                @endforeach
              
              </div>
              <!-- Add Arrows -->
              <div class="swiper-button-next"><i class="fa fa-angle-right"></i></div>
              <div class="swiper-button-prev"><i class="fa fa-angle-left"></i></div>
            </div>
          </div> --}}
          <div class="col-lg-12 col-md-12 newsaccordions">
            <h3>Why we are best.</h3>
            <div class="bs-example">
              <div class="accordion" id="accordionExample">
                @php  $count = 0;@endphp
                @foreach($bests as $best)
                @php ++$count; @endphp
                <div class="card" data-aos="fade-up">
                  <div class="card-header" id="heading{{@$count}}">
                    <h2 class="mb-0" >
                        <button type="button" class="btn btn-link" data-toggle="collapse" data-target="#collapse{{@$count}}">{{@$best->title}}<i class="fa fa-plus"></i></button>
                    </h2>
                  </div>
                  <div id="collapse{{@$count}}" class="collapse" aria-labelledby="heading{{@$count}}" data-parent="#accordionExample">
                    <div class="card-body">
                       <p data-aos="fade-up">{{@$best->description}}</p>
                    </div>
                  </div>
                </div>
                @endforeach
                {{-- <div class="card" data-aos="fade-up">
                  <div class="card-header" id="headingTwo">
                    <h2 class="mb-0">
                      <button type="button" class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseTwo">Professional ELO Boosters <i class="fa fa-plus"></i></button>
                    </h2>
                  </div>
                  <div id="collapseTwo" class="collapse show" aria-labelledby="headingTwo" data-parent="#accordionExample">
                    <div class="card-body">
                      <p>We have real reviews spanning multiple sites such as EpicNPC so you know you are dealing with a trusted service.</p>
                    </div>
                  </div>
                </div> --}}
                {{-- <div class="card" data-aos="fade-up">
                  <div class="card-header" id="headingThree">
                    <h2 class="mb-0">
                      <button type="button" class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseThree">Verified Reviews <i class="fa fa-plus"></i></button>
                    </h2>
                  </div>
                  <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordionExample">
                    <div class="card-body">
                      <p>We have real reviews spanning multiple sites such as EpicNPC so you know you are dealing with a trusted service.</p>
                    </div>
                  </div>
                </div> --}}
              </div>
            </div>
          </div>
        </div>
        <div class="row" data-aos="fade-up">
          <div class="col-md-12">
            <div class="para-content">
              <p>VeteranBoosters.Com is proud to offer the best ELO Boost service in the industry! We offer cheap rates, top level players, and fast results.</p>

              <p>When you buy from Veteran Boosters you can be confident you are getting the safest, fastest, and most cost effective ELO Boost.</p>

              <p>We are called Veteran Boosters for a reason, our boosters are experienced and fiercely competitive.</p>

              <p>Are you tired of trolls? What about playing hundreds of games and getting nowhere? The solution is simple, an ELO Boost!</p>

              <p>We will help you get into the division you deserve where you will find good teammates, less trolls, and games that are a lot more fun.</p>

              <p>You also gain the benefit of impressing your friends with your new ELO which will help you find better players to duo with!</p>
            </div>
          </div>
        </div>
      </div>
    </section>
    <section id="testimonials" data-aos="fade-up">
      <h2>WHAT OUR CLIENTS SAY ABOUT US</h2>
      <div class="container">
        <img src="{{ asset('assets/images/testimonialleft.png')}}" class="testileft" />
        <img src="{{ asset('assets/images/testimonialRight.png')}}" class="testiRight" />
        <div class="slider">
          @foreach($aboutus as $val)

          <div class="slider__item">
            <div class="slidebox">
              <img src='/storage/NewsImages/{{$val->image}}' />
              <h4>{{$val->title}}</h4>
              <p>{{$val->description}}</p>
            </div>
          </div>

          @endforeach
          {{-- <div class="slider__item">
            <div class="slidebox">
              <img src="{{ asset('assets/images/client1.png')}}" />
              <h4>Callen</h4>
              <p>Great service . Plat 1 > Diamond 5 less than one day , Professional booster , work very hard , won 14/4 A++++++ recommended</p>
            </div>
          </div>
          <div class="slider__item">
            <div class="slidebox">
              <img src="{{ asset('assets/images/client2.png')}}" />
              <h4>Killerwave</h4>
              <p>Great service! Very reliable, purchased a p1 to d5 boost and promos were free! Would use again</p>
            </div>
          </div>
          <div class="slider__item">
            <div class="slidebox">
              <img src="{{ asset('assets/images/client3.png')}}" />
              <h4>Peterkwokjai</h4>
              <p>Very fast service. Done is a week. Has plenty of people working with him to make sure your account is done is a timely manner. Will do business again anytime.</p>
            </div>
          </div>
          <div class="slider__item">
            <div class="slidebox">
              <img src="{{ asset('assets/images/client1.png')}}" />
              <h4>Madeinukrainee</h4>
              <p>Got me into plat 5 from gold 3, the boosters are awesome & know how to carry!</p>
            </div>
          </div> --}}
        </div>
      </div>
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <h3>We are Expert ELO Boosters and we want to hear from you!</h3>
            <p>We are the best in our field, and if you have any questions at all before ordering don't hesitate to ask! You can reach us leaving a message on the live chat at the bottom of this page. We will get back to you with an answer as soon as possible!</p>
          </div>
        </div>
      </div>
    </section>
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
    </footer>
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
  </body>
</html>
