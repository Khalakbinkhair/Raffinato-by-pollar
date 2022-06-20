@extends('layouts.admin-layouts')
@section('content')  

<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-12">
      <div class="navbar-nav ml-auto">
        @guest
          <li class="nav-item">
            <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
          </li>
          @if (Route::has('register'))
            <li class="nav-item">
              <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
            </li>
          @endif
        @else
      @endguest
    </div>
    <section class="content">
        @if (session('message'))
                <div id="hidediv" class="alert alert-success-polar alert-dismissible">
                  <a class="close" data-dismiss="alert" aria-label="close">&times;</a>
                  <strong>Thanks!</strong> {{ session('message') }}
                </div>
              @endif
      <div class="container-fluid">
        <div class="row align-items-center">
          <div class="col-lg-6 col-md-10 mx-auto">
            <div class="">
              <form action="{{ route('admin.save_stock')}}"method="POST"  enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="">
                  <div class="field">
                    <fieldset>
                      <legend>Product</legend>
                      <select name="product_id" class="form-control selectpicker" data-live-search="true" aria-label="Default select example" required="">
                        <option value="">Select Product</option>
                        @foreach($products as $info)
                        <option value="{{ $info->id }}">{{ $info->name }}</option>
                        @endforeach
                      </select>
                    </fieldset>
                  </div>
                  <div class="field">
                    <fieldset>
                      <legend>Input Date</legend>
                      <input type="date" name="input_date" value="{{ date('Y-m-d') }}" class="form-control" required="">
                    </fieldset>
                  </div>
                  <div class="field">
                    <fieldset>
                      <legend>Stock Status</legend>
                      <div class="form-check-inline">
                        <legend class="form-check-label" for="radio1">
                          <input type="radio" name="status" class="form-check-input" id="radio1" name="optradio" value="1" checked>In
                        </legend>
                      </div>
                      <div class="form-check-inline">
                        <legend class="form-check-label" for="radio2">
                          <input type="radio" name="status" class="form-check-input" id="radio2" name="optradio" value="0">Out
                        </legend>
                      </div>
                    </fieldset>
                  </div>
                  
                  <div class="field">
                    <fieldset>
                      <legend>Amount</legend>
                      <input type="number" name="amount" class="form-control" min="1">
                    </fieldset>
                  </div>
                </div>
                <div class="submit-btn">
                  <center>
                  <button type="submit" style="padding-left: 4rem; padding-right: 4rem;" class="btn btn-primary submit-Btn">Submit</button>
                  </center>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>
</div>
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.21.0/moment.min.js" type="text/javascript"></script>
<script type="text/javascript">
        setTimeout(function() {
          $('#hidediv').fadeOut('fast');
      }, 5000);
</script>

@endsection
