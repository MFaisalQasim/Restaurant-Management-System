@extends('layouts.frontLayout')
@section('externalCssLinks')
@endsection

@section('customStyle')
@endsection

@section('content')
<section class="hero-bg">
    <div class="bg">
      <div class="container bg2-text">
        <h1 class="text-center hero-text">ALL ORDERS CURRENTLY 50% OFF!!</h1>
        <h5 class="text-center hero-text">LIMITED TIME ONLY – PRICES ARE ALREADY ADJUSTED BELOW</h5>
        <h3 class="text-center hero-text elo-text">ELO Boost</h3>
      </div>
    </div>
  </section>
  <section id="card-cols">
    <div class="container">
      <div class="row">
        <div class="col-12 col-md-6 col-left" data-aos="fade-up">
          <div class="card helmet-card main-helmet-card" data-aos="fade-up">
            <img class="card-img-top pg2-card-img" src="{{ asset('assets/images/silver_1.png')}}" alt="silver" width="135px" />
            <div class="card-body">
              <div class="row silver-row">
                <div class="col-6 col-md-7 sliver-col">
                  <div class="dropdown show">
                    <a class="btn btn dropdown-toggle dropdown-toggle-ellipsis" href="#" role="button" id="dropdownMenuLink1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                      Silver
                    </a>

                    <div class="dropdown-menu" aria-labelledby="dropdownMenuLink1">
                      <a class="dropdown-item" href="#">Silver</a>
                      <a class="dropdown-item" href="#">Gold</a>
                    </div>
                  </div>
                </div>
                <div class="col">
                  <div class="dropdown show">
                    <a class="btn btn dropdown-toggle" href="#" role="button" id="selectNum" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">1</a>
                    <div class="dropdown-menu" aria-labelledby="selectNum">
                      <a class="dropdown-item" href="#">1</a>
                      <a class="dropdown-item" href="#">2</a>
                    </div>
                  </div>
                </div>
              </div>
              <div class="row row-current">
                <div class="col-5 current">
                  <p>Current:</p>
                </div>
                <div class="col-7">
                  <div class="dropdown show">
                    <a class="btn btn dropdown-toggle" href="#" role="button" id="lp" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                      0-20 LP
                    </a>
                    <div class="dropdown-menu" aria-labelledby="lp">
                      <a class="dropdown-item" href="#">0-20 LP</a>
                      <a class="dropdown-item" href="#">0-20 LP</a>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-12 col-md-6 col-right gold-helmet-right" data-aos="fade-up">
          <div class="card helmet-card main-helmet-card" data-aos="fade-up">
            <img class="card-img-top pg2-card-img" src="{{ asset('assets/images/gold_4 (1).png')}}" alt="gold" width="135px" />
            <div class="card-body">
              <div class="row">
                <div class="col-sm-7 sliver-col">
                  <div class="dropdown show">
                    <a class="btn btn dropdown-toggle" href="#" role="button" id="dropdownMenuLink1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                      Gold
                    </a>

                    <div class="dropdown-menu" aria-labelledby="dropdownMenuLink1">
                      <a class="dropdown-item" href="#">Silver</a>
                      <a class="dropdown-item" href="#">Gold</a>
                    </div>
                  </div>
                </div>
                <div class="col">
                  <div class="dropdown show">
                    <a class="btn btn dropdown-toggle" href="#" role="button" id="selectNum" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">1</a>
                    <div class="dropdown-menu" aria-labelledby="selectNum">
                      <a class="dropdown-item" href="#">1</a>
                      <a class="dropdown-item" href="#">2</a>
                    </div>
                  </div>
                </div>
              </div>
              <div class="row region-row">
                <div class="col-4 col-md-4 region">
                  <p>Region:</p>
                </div>
                <div class="col-7 col-md-7 region">
                  <div class="dropdown show">
                    <a class="btn btn dropdown-toggle" href="#" role="button" id="countries" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">North America</a>
                    <div class="dropdown-menu" aria-labelledby="countries">
                      <a class="dropdown-item" href="#">North America</a>
                      <a class="dropdown-item" href="#">England</a>
                    </div>
                  </div>
                </div>
              </div>
              <div class="row flex-row">
                <div class="col-4 col-md-4 current">
                  <p>Flex:</p>
                </div>
                <div class="col-7 col-md-7 region">
                  <div class="dropdown show">
                    <a class="btn btn dropdown-toggle" href="#" role="button" id="chooseOption" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                      Yes
                    </a>
                    <div class="dropdown-menu" aria-labelledby="chooseOption">
                      <a class="dropdown-item" href="#">Yes</a>
                      <a class="dropdown-item" href="#">No</a>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="row aaa">
        <form class="form3Field" data-aos="fade-up">
          <div class="row form-row">
            <div class="col-12 col-md-4">
              <input type="text" class="form-control form-field" placeholder="Username" />
            </div>
            <div class="col-12 col-md-4">
              <input type="password" class="form-control form-field" placeholder="Password" />
            </div>
            <div class="col-12 col-md-4">
              <input type="text" class="form-control form-field" placeholder="Summoner Name" />
            </div>
          </div>
        </form>
      </div>
    </div>
  </section>

  <section class="checkboxes">
    <div class="container">
      <form>
        <div class="row" data-aos="fade-up">
          <div class="col">
            <div class="form-check">
              <input type="checkbox" class="form-check-input" id="exampleCheck1" />
              <label class="form-check-label pg1-form-check" for="exampleCheck1">Upgrade to Duo Boost (no login info required) +100%</label>
            </div>
            <div class="form-check">
              <input type="checkbox" class="form-check-input" id="exampleCheck2" />
              <label class="form-check-label pg1-form-check" for="exampleCheck2">Upgrade to Teamfight Tactics - TFT (Free To Upgrade) +0%</label>
            </div>
            <div class="row price-row">
              <div class="col">
                <h3 class="main-price">Price : $43.00 USD</h3>
                <p class="cross-price">Price :$86.00 USD</p>
                <h5 class="save-price">Save : $43.00 USD (50%)</h5>
                <div class="row justify-content-center payment-row">
                  <div class="col-12 col-md-4 pay-btn-col">
                    <button type="button" class="btn mb-2 paypal" data-aos="fade-up"><img src="{{ asset('assets/images/paypal.png')}}" alt="paypal-img" /></button>
                  </div>
                  <div class="col-12 col-md-4 pay-btn-col">
                    <button type="button" class="btn mb-2 creditBtn" data-aos="fade-up">CreditCard/Bitcoins</button>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </form>
    </div>
  </section>
  <section class="victory">
    <div class="vic-bg"></div>
  </section>
  <section class="price-low">
    <div class="container">
      <div class="row">
        <div class="col">
          <h2 class="text-center" data-aos="fade-up">How are the prices so low?</h2>
          <p data-aos="fade-up">Short answer? Because we are a wholesale elo boosting service for other websites. When people order from another elo boosting site, that order will likely end up with us. The fact is, there are only so many top players that can boost. And since we have been around the longest, most of them are here. So sites will often hire us to complete orders for them. And we must charge less than they do for those sites to make a profit. With us you are buying directly from the source, so you get the same thing at a lower price.</p>
          <ul data-aos="fade-up">
            <li>Our teams consist of the very top players (you probably know them)</li>
            <li>Our boosting methods will ensure that nobody knows about your order</li>
            <li>Our completion time is always rapid</li>
            <li>We offer the best pricing by far</li>
            <li>We are the only site that won't charge extra for Low MMR Gains</li>
            <li>With nearly 10 years of service and a loyal fanbase we can't disappoint!</li>
            <li>100,000+ customers can’t be wrong! Try LoL's first boosting site today!</li>
          </ul>
        </div>
      </div>
    </div>
  </section>

@endsection

@section('externalJsLinks')
@endsection
@section('pageCustomJS')
@endsection