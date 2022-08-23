
<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Login | TVR</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="icon"  href="{{ asset('assets/images/favicon.png')}}" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" />
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" type="text/css" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="{{ asset('assets/global/css/swiper.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/global/css/style.css') }}" />
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
  </head>
  <body class="pg11-body">

   
    <section class="login-section">
        <form class="form-horizontal form-material" id="loginform" method="post" action="{{ route('login') }}">
            {{csrf_field()}}
      <div class="container login-img-container">
        <div class="row main-img-row text-center" data-aos="flip-left" data-aos-easing="ease-out-cubic" data-aos-duration="2000">
          <div class="col">
            <a href="/"><img src="{{ asset('assets/images/sitelogo.png')}}" /></a>
          </div>
        </div>
      </div>
      <div class="container login-form-container" data-aos="flip-left" data-aos-easing="ease-out-cubic" data-aos-duration="2000">
        <div class="row">
          <div class="col">
            <h1>Enter Email & Password to Continue.</h1>
          </div>
        </div>
       
        <div class="row">
          <div class="col">
            <div class="input-group mb-3 my-group-field">
              <div class="input-group-prepend">
                <span class="input-group-text person-img"></span>
              </div>

              <input id="email" placeholder="Email" aria-label="Username" aria-describedby="basic-addon1" class=" my-form-control form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required autofocus>
                @if ($errors->has('email'))
                    <span class="invalid-feedback">
                        <strong>{{ $errors->first('email') }}</strong>
                    </span>
                @endif
              {{-- <input type="text" class="form-control my-form-control" placeholder="Username" aria-label="Username" aria-describedby="basic-addon1" /> --}}
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col">
            <div class="input-group mb-3 my-group-field">
              <div class="input-group-prepend">
                <span class="input-group-text lock-img"></span>
              </div>

              <input id="password"  type="password" placeholder="Password" aria-label="Username" aria-describedby="basic-addon1" class="my-form-control form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required placeholder="Password">
              @if ($errors->has('password'))
                  <span class="invalid-feedback">
                              <strong>{{ $errors->first('password') }}</strong>
                  </span>
              @endif



              {{-- <input type="text" class="form-control my-form-control" placeholder="Password" aria-label="Username" aria-describedby="basic-addon1" /> --}}
            </div>
          </div>
        </div>
      
        <div class="row">
          <div class="col text-center">
               <button class="btn login-btn" type="submit"> Log In
                        </button>
            {{-- <button type="submit" class="btn login-btn">Login</button> --}}
          </div>
        </div>
      </div>
    </form>
    </section>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.min.js"></script>

    <script src="{{ asset('assets/global/js/swiper.min.js') }}"></script>
    <script src="{{ asset('assets/global/js/custom.js') }}"></script>
    <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
    <script>
      AOS.init();
    </script>
  </body>
</html>
