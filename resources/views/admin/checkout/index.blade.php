
@extends('admin.layout.default')

@section('title', 'Checkout Premium Account')

@section('content')

<section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Checkout</h1>
          </div>          
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">              
              <!-- /.card-header -->
              @if(Session::get('message'))
              <div class="card-body">                                
                <div class="alert alert-success alert-dismissible">
                  <button type="button" class="close" data-dismiss="alert">&times;</button>  
                  <strong>{{Session('message')}}</strong>
              </div>    
              @endif       
                <div class="container m-3">       
                    <div class="row">
                        <div class="col-md-5 offset-md-4">
                            <div class="panel panel-default credit-card-box">                                
                                <div class="panel-body">                                                                    
                                    <form role="form" action="{{ route('premium.purchase') }}" method="post" class="require-validation"
                                                                    data-cc-on-file="false"
                                                                    data-stripe-publishable-key="{{ env('STRIPE_KEY') }}"
                                                                    id="payment-form">
                                        @csrf                      
                                        <div class="stripe-card-body">          
                                            <div class='form-row row'>
                                                <div class='col-md-12 mb-3 required'>
                                                    <label class='control-label'>Card Number</label> 
                                                    <input autocomplete='on' class='form-control card-number' size='20' type='text'>
                                                </div>
                                            </div>
                    
                                            <div class='form-row row'>
                                                <div class='col-xs-12 col-md-4 form-group cvc required'>
                                                    <label class='control-label'>CVC</label> <input autocomplete='off'
                                                        class='form-control card-cvc' placeholder='ex. 311' size='4'
                                                        type='text'>
                                                </div>
                                                <div class='col-xs-12 col-md-4 form-group expiration required'>
                                                    <label class='control-label'>Expiration Month</label> <input
                                                        class='form-control card-expiry-month' placeholder='MM' size='2'
                                                        type='text'>
                                                </div>
                                                <div class='col-xs-12 col-md-4 form-group expiration required'>
                                                    <label class='control-label'>Expiration Year</label> <input
                                                        class='form-control card-expiry-year' placeholder='YYYY' size='4'
                                                        type='text'>
                                                </div>
                                            </div>
                                        </div>
                                        <div class='form-row row'>
                                            <div class='col-md-12 error form-group d-none'>
                                                <div class='alert-danger alert'>Please correct the errors and try
                                                    again.</div>
                                            </div>
                                        </div>
                
                                        <div class="row">
                                            <div class="col-md-12 mt-3">
                                                <button class="btn btn-primary btn-md btn-block" type="submit">Pay Now ($100)</button>
                                            </div>
                                        </div>
                                        
                                    </form>
                                </div>
                            </div>        
                        </div>
                    </div>
                    
                </div>
                </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->

@endsection
  @push('stripe')
            <script type="text/javascript" src="https://js.stripe.com/v2/"></script>
            <script type="text/javascript">
            $(function() {
                var $form         = $(".require-validation");
            $('form.require-validation').bind('submit', function(e) {
                var $form         = $(".require-validation"),
                    inputSelector = ['input[type=email]', 'input[type=password]',
                                    'input[type=text]', 'input[type=file]',
                                    'textarea'].join(', '),
                    $inputs       = $form.find('.required').find(inputSelector),
                    $errorMessage = $form.find('div.error'),
                    valid         = true;
                    $errorMessage.addClass('d-none');
            
                    $('.has-error').removeClass('has-error');
                $inputs.each(function(i, el) {
                var $input = $(el);
                if ($input.val() === '') {
                    $input.parent().addClass('has-error');
                    $errorMessage.removeClass('d-none');
                    e.preventDefault();
                }
                });
            
                if (!$form.data('cc-on-file')) {
                e.preventDefault();
                Stripe.setPublishableKey($form.data('stripe-publishable-key'));
                Stripe.createToken({
                    number: $('.card-number').val(),
                    cvc: $('.card-cvc').val(),
                    exp_month: $('.card-expiry-month').val(),
                    exp_year: $('.card-expiry-year').val()
                }, stripeResponseHandler);
                }
            
            });
            
            function stripeResponseHandler(status, response) {
                    if (response.error) {
                        $('.error')
                            .removeClass('d-none')
                            .find('.alert')
                            .text(response.error.message);
                    } else {
                        // token contains id, last4, and card type
                        var token = response['id'];
                        // insert the token into the form so it gets submitted to the server
                        $form.find('input[type=text]').empty();
                        $form.append("<input type='hidden' name='stripeToken' value='" + token + "'/>");
                        $form.get(0).submit();
                    }
                }
            
            });
            </script>



  @endpush


 
 