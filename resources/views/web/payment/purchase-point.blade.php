@extends('web.layout.default')
@section('title', 'Purchase Consume Points ')
@section('content')
  <!-- ======= Hero Section ======= -->
  <section id="banner" class="d-flex flex-column justify-content-center align-items-center">
    <div class="container-fluid banner-container" data-aos="fade-up">
      <div class="row m-2">
          <div class="col-md-12">
            <h3>Purchase Consume Points</h3>
          </div>
      </div>
    </div>
  </section><!-- End Hero -->
    <!-- ======= Contact Section ======= -->
    <section id="contact" class="contact section-bg">
        <div class="container">
            <div class="row">
                <div class="col-md-6 offset-md-3 profile-form-container">
                    <form action="{{url('purchase-point')}}" method="post">
                        @csrf
                        <p>You have to pay to get more consume points. </p>
                        <button class="btn btn-primary">Pay 100/-</button>
                    </form>
                </div>
            </div>
        </div>
    </section><!-- End Contact Section -->
@endsection