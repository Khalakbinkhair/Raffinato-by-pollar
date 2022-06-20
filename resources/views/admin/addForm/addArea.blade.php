@extends('layouts.admin-layouts')
@section('content')  
    <section class="content">
      <div class="container-fluid">
      
            
             
              <form action="{{ route('save_area')}}"method="POST"  enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="card">

                  <fieldset>
                    <legend><center><b>Information</b></center></legend>
                   
                  </fieldset>
                  <fieldset>
                    <div class="form-group row">
                    <label for="district_name" class="col-sm-3 col-form-label text-right">District Name</label>
                    <div class="col-sm-6">
                    <input type="text" name="district_name" class="form-control" placeholder="Enter District Name...">
                  </div>
                </div>
                  </fieldset>
                  <fieldset>
                    <div class="form-group row">
                      <label for="market_name" class="col-sm-3 col-form-label text-right">Market Name</label>
                      <div class="col-sm-6">          
                    <input type="text" name="market_name" class="form-control" placeholder="Enter Market Name...">
                  </div>
                </div>
                  </fieldset>
                  <fieldset>
                    <div class="form-group row">
                      <label for="shop_name" class="col-sm-3 col-form-label text-right">Shop Name</label>
                      <div class="col-sm-6">
                    <input type="text" name="shop_name" class="form-control" placeholder="Enter Shop Name...">&nbsp&nbsp&nbsp&nbsp
                  
                 
                 <center>
                    <button type="submit" class="btn btn-primary submit-Btn">Submit</button>
                  </center>
                  </fieldset>


                </div>
                
              </form>
            </div>
          </div>

        </div>
      </div>
    </section>

  @endsection