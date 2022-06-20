@extends('layouts.admin-layouts')
@section('content')  
    <section class="content">
      <div class="container-fluid">
        <div class="row align-items-center">
          <div class="col-md-6 mx-auto">
            <div class="card card-primary">
              <div class="card-header submit-Btn">
                <h3 class="card-title">Add Area</h3>
              </div>
              <form action="{{ route('save_area')}}"method="POST"  enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="card-body">
                  <div class="form-group">
                    <label>Area</label>
                    <input type="text" name="area" class="form-control" placeholder="Enter ..." required="">
                  </div>
                </div>
                <div class="card-footer">
                  <button type="submit" class="btn btn-primary submit-Btn">Submit</button>
                </div>
              </form>
            </div>
          </div>

        </div>
      </div>
    </section>

  @endsection