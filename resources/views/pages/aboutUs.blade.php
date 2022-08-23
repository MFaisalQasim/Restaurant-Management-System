@extends('layouts.frontLayout')
@section('externalCssLinks')
@endsection

@section('customStyle')
@endsection

@section('content')
<section class="hero-bg">
    <div class="bg10">
      <div class="container bg2-text">
        <h1 class="text-center hero-text">We are the BEST Boosters</h1>
        <p class="text-center hero-text">Veteran Boosters was created with the goal of being the best boosting site around. We have achieved this by treating every order as a VIP order, and constantly bettering ourselves. The reasons you should buy from us are simple:</p>
      </div>
    </div>
  </section>

  <section class="booster-list-sec">
    <div class="container">
      <ul class="booster-list-ul" data-aos="fade-up">
        <li>Our teams consist of the very top players (you probably know them)</li>
        <li>Our boosting methods will ensure that nobody knows about your order</li>
        <li>Our completion time is always rapid</li>
        <li>We offer the best pricing by far</li>
        <li>We are the only site that won't charge extra for Low MMR Gains</li>
        <li>With nearly 10 years of service and a loyal fanbase we can't disappoint!</li>
        <li>100,000+ customers can’t be wrong! Try LoL's first boosting site today!</li>
      </ul>
    </div>
  </section>
  <section class="booster-accordion-sec accordion-sec">
    <div class="container">
      <div class="row" data-aos="fade-up">
        <div class="col">
          <h3 class="booster-heading">We are the BEST Boosters</h3>
        </div>
      </div>
      <div class="row">
        <div class="bs-example accordion-container">
          <div class="accordion" id="accordionExample" data-aos="fade-up">
            @php $count = 0; @endphp
            @foreach($blogs as $blog)

              @php ++$count; @endphp
              <div class="card">
                <div class="card-header" id="heading{{@$count}}">
                  <h2 class="mb-0">
                    <button type="button" class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapse{{@$count}}">
                      <i class="fa fa-plus"></i>{{@$blog->title}}</button>
                  </h2>
                </div>
                @if($count == 1)
                  <div id="collapse{{@$count}}" class="collapse show" aria-labelledby="heading{{@$count}}" data-parent="#accordionExample">
                @else    
                  <div id="collapse{{@$count}}" class="collapse" aria-labelledby="heading{{@$count}}" data-parent="#accordionExample">
                @endif
                  <div class="card-body">
                    <p>{{@$blog->description}}</p>
                  </div>
                </div>
              </div>
            @endforeach

            {{-- <div class="card">
              <div class="card-header" id="headingTwo">
                <h2 class="mb-0">
                  <button type="button" class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseTwo"><i class="fa fa-plus"></i>Great Support</button>
                </h2>
              </div>
              <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
                <div class="card-body">
                  <p>Customers often climb on their own after getting good teammates. Sometimes you just need someone to unstuck you from that elo first.</p>
                </div>
              </div>
            </div>
            <div class="card">
              <div class="card-header" id="headingThree">
                <h2 class="mb-0">
                  <button type="button" class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseThree"><i class="fa fa-plus"></i>Order Tracking</button>
                </h2>
              </div>
              <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordionExample">
                <div class="card-body">
                  <p>Customers often climb on their own after getting good teammates. Sometimes you just need someone to unstuck you from that elo first.</p>
                </div>
              </div>
            </div> --}}
          </div>
        </div>
      </div>

      <div class="row progress-bar-row" data-aos="fade-up">
        <div class="container">
          <div class="row average-rate-heading">
            <div class="col">
              <h3>Average Gold Win Rate</h3>
            </div>
          </div>
          <div class="row progress-row">
            <div class="col">
              <div class="progress">
                <div class="progress-bar progress-bar-striped progress-bar-animated blue" role="progressbar" style="width: 95%;" aria-valuenow="10" aria-valuemin="0" aria-valuemax="100"></div>
              </div>
            </div>
          </div>
          <div class="row average-rate-heading">
            <div class="col">
              <h3>Average Platinum Win Rate</h3>
            </div>
          </div>
          <div class="row">
            <div class="col">
              <div class="progress">
                <div class="progress-bar progress-bar-striped progress-bar-animated yellow" role="progressbar" style="width: 90%;" aria-valuenow="10" aria-valuemin="0" aria-valuemax="100"></div>
              </div>
            </div>
          </div>
          <div class="row average-rate-heading">
            <div class="col">
              <h3>Average Diamond Win Rate</h3>
            </div>
          </div>
          <div class="row">
            <div class="col">
              <div class="progress">
                <div class="progress-bar progress-bar-striped progress-bar-animated green" role="progressbar" style="width: 85%;" aria-valuenow="10" aria-valuemin="0" aria-valuemax="100"></div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <section class="client-sec">
    <div class="container">
      <div class="row" data-aos="fade-up">
        <div class="col">
          <h1 class="client-heading">WHAT OUR CLIENTS SAY ABOUT US</h1>
        </div>
      </div>
      <div class="row client-row" data-aos="fade-up">
        <div class="col-12 col-md-12 col-lg-6 client-left-col">
          <div class="row hero-img-row">
            <div class="col-4">
              <div class="hero-img"></div>
            </div>
            <div class="col-8">
              <p>Very fast service. Done is a week. Has plenty of people working with him to make sure your account is done is a timely manner. Will do business again anytime.</p>
              <h3>Peterkwokjai / <span>Customer</span></h3>
            </div>
          </div>
        </div>
        <div class="col-12 col-md-12 col-lg-6 client-left-col">
          <div class="row hero-img-row">
            <div class="col-4">
              <div class="hero-img2"></div>
            </div>
            <div class="col-8">
              <p>Great service . Plat 1 > Diamond 5 less than one day , Professional booster , work very hard , won 14/4 A++++++ recommended</p>
              <h3>Callen / <span>Customer</span></h3>
            </div>
          </div>
        </div>
      </div>
      <div class="row client-row" data-aos="fade-up">
        <div class="col-12 col-md-12 col-lg-6 client-left-col">
          <div class="row hero-img-row">
            <div class="col-4">
              <div class="hero-img3"></div>
            </div>
            <div class="col-8">
              <p>Great service! Very reliable, purchased a p1 to d5 boost and promos were free! Would use again</p>
              <h3>Killerwave / <span>Customer</span></h3>
            </div>
          </div>
        </div>
        <div class="col-12 col-md-12 col-lg-6 client-left-col">
          <div class="row hero-img-row">
            <div class="col-4">
              <div class="hero-img4"></div>
            </div>
            <div class="col-8">
              <p>Got me into plat 5 from gold 3, the boosters are awesome & know how to carry!</p>
              <h3>madeinukrainee / <span>Customer</span></h3>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

@endsection

@section('externalJsLinks')
@endsection
@section('pageCustomJS')
@endsection