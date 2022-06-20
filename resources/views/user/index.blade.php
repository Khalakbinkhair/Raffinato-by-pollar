@extends('layouts.user-latouts')
<style>

  /* Styling h1 and links
  ––––––––––––––––––––––––––––––––– */
  
  
  .mocha_click > input, .vanilla_click  > input, .mint_click > input 
   {display: none;}  /* Remove radio buttons */
  
  .mocha_click > label:before, .vanilla_click  > label:before, .mint_click > label:before  { 
    content: "\f005"; /* Star */
    margin: -5px;
    font-size: 10px;
    font-family: FontAwesome;
    /* display: inline-block;  */
  }
  
  .mocha_click > label,.vanilla_click > label, .mint_click > label
  {
    color: #222222; /* Start color when not clicked */
  }
  
  .mocha_click > input:checked ~ label,.vanilla_click  > input:checked ~ label,.mint_click > input:checked ~ label
  { color: #ffca08 ; } /* Set yellow color when star checked */
  
  .mocha_click > input:hover ~ label,.vanilla_click  > input:hover ~ label, .mint_click > input:hover ~ label
  { color: #ffca08 ;  } /* Set yellow color when star hover */
  
  
      </style>
      
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
        <div class="row align-items-center">
          <div class="col-lg-6 col-md-10 mx-auto">
              <form action="{{ route('save_member_info')}}"method="POST"  enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="">
                  <div class="field">
                    <fieldset>
                      <legend>Name</legend>
                      <input type="text" name="name" class="form-control" placeholder="Enter name..." required="">
                    </fieldset>
                  </div>
                
                  <div class="field">
                    <fieldset>
                      <legend>Club Name</legend>
                      <select name="club_name" class="form-control selectpicker" aria-label="Default select example">
                          <option value="Uttara">Uttara</option>
                          <option  value="Gulshan">Gulshan</option>
                          <option value="Banani">Banani</option>                     
                      </select>
                    </fieldset>
                  </div>


                  <div class="field">
                    <fieldset>
                      <legend>Member Id</legend>
                      <input type="text" name="member_id" class="form-control" placeholder="Enter member Id...">
                    </fieldset>
                  </div>
                  <div class="field">
                    <fieldset>
                      <legend>Gender</legend>
                      <div class="form-check-inline">
                        <legend class="form-check-label" for="radio1">
                          <input type="radio" name="gender" class="form-check-input" id="radio1" name="optradio" value="male" checked>Male
                        </legend>
                      </div>
                      <div class="form-check-inline">
                        <legend class="form-check-label" for="radio2">
                          <input type="radio" name="gender" class="form-check-input" id="radio2" name="optradio" value="female">Female
                        </legend>
                      </div>
                    </fieldset>
                  </div>
                  <div class="field">
                    <fieldset>
                      <legend>Area</legend>
                      <select name="area" class="form-control selectpicker" data-live-search="true" aria-label="Default select example">
                        @foreach($area as $info)
                        <option>{{ $info->area }}</option>
                        @endforeach
                      </select>
                    </fieldset>
                  </div>
                  <div class="field">
                    <fieldset>
                      <legend>Contact No.</legend>
                      <input type="number" name="phone" class="form-control" placeholder="Contact no...">
                    </fieldset>
                  </div>
                  <div class="field">
                    <fieldset>
                      <legend for="exampleInputEmail1">Email address</legend>
                      <input type="email" class="form-control" name="email" id="exampleInputEmail1" placeholder="Enter email ...">
                    </fieldset>
                  </div>
                  {{-- //______ Checker___________ --}}
                   <div class="field check-box">
                     <div class="row">
                       <div class="col-4 col-md-4 text-center ">
                         <fieldset>
                           <input type="checkbox" name="mocha" class="form-check-input" id="mocha_rating" onclick="Mocha_function()" style="left:66%">
                           
                           <label class="form-check-label" for="mocha_rating"> <img style="width: 5rem;" class="img-fluid" src="{{asset('frontend/image/Raffinato_Mocha.png')}}"/></label>                        
                           <div id="mocha_click" style="display:none">
                             <div class="mocha_click d-flex justify-content-center flex-row-reverse">
                             <input type="radio" id="mocha_star5" name="mocha_rating" value="5" /><label for="mocha_star5" title="5 star"></label>
                             <input type="radio" id="mocha_star4" name="mocha_rating" value="4" /><label for="mocha_star4" title="4 star"></label>
                             <input type="radio" id="mocha_star3" name="mocha_rating" value="3" /><label for="mocha_star3" title="3 star"></label>
                             <input type="radio" id="mocha_star2" name="mocha_rating" value="2" /><label for="mocha_star2" title="2 star"></label>
                             <input type="radio" id="mocha_star1" name="mocha_rating" value="1" /><label for="mocha_star1" title="1 star"></label>
                             </div>                 
                 </div>                  
                         </fieldset>
                       </div>
                       <div class="col-4 col-md-4 text-center">
                         <fieldset>
                           <input type="checkbox" name="natural_vanilla" class="form-check-input" id="vanilla_rating" onclick="Vanilla_function()" style="left:66%">
                           <label class="form-check-label" for="vanilla_rating"><img style="width: 5rem;" class="img-fluid" src="{{asset('frontend/image/Raffinato_Vanilla.png')}}"/></label>               
                           <div id="vanilla_click" style="display:none">
                                         <div class="vanilla_click d-flex justify-content-center flex-row-reverse">
                                             <input type="radio" id="vanilla_star5" name="vanilla_rating" value="5" /><label for="vanilla_star5" title="5 star"></label>
                                             <input type="radio" id="vanilla_star4" name="vanilla_rating" value="4" /><label for="vanilla_star4" title="4 star"></label>
                                             <input type="radio" id="vanilla_star3" name="vanilla_rating" value="3" /><label for="vanilla_star3" title="3 star"></label>
                                             <input type="radio" id="vanilla_star2" name="vanilla_rating" value="2" /><label for="vanilla_star2" title="2 star"></label>
                                             <input type="radio" id="vanilla_star1" name="vanilla_rating" value="1" /><label for="vanilla_star1" title="1 star"></label>
                                         </div>
                                          </div>
                             </fieldset>
                           </div>
 
                           <div class="col-4 col-md-4 text-center">
                             <fieldset>
                           <input type="checkbox" name="mint_chocolate" class="form-check-input" id="mint_rating" onclick="Mint_function()"style="left:66%">
                           <label class="form-check-label" for="mint_rating"><img style="width: 5rem;" class="img-fluid" src="{{asset('frontend/image/Raffinato_Mint.png')}}"/></label>                   
                           <div id="mint_click" style="display:none">              
                                     <div class="mint_click d-flex justify-content-center flex-row-reverse">
                                         <input type="radio" id="mint_star5" name="mint_rating" value="5" /><label for="mint_star5" title="5 star"></label>
                                         <input type="radio" id="mint_star4" name="mint_rating" value="4" /><label for="mint_star4" title="4 star"></label>
                                         <input type="radio" id="mint_star3" name="mint_rating" value="3" /><label for="mint_star3" title="3 star"></label>
                                         <input type="radio" id="mint_star2" name="mint_rating" value="2" /><label for="mint_star2" title="2 star"></label>
                                         <input type="radio" id="mint_star1" name="mint_rating" value="1" /><label for="mint_star1" title="1 star"></label>
                                     </div>
                                
                             
                                 
                     </div>
                
                         </fieldset>
                       </div>
 
                     </div>
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
 <!--           <div class="fatmonk-image pt-5">
             <center>
               <img  src=" {{asset('frontend/image/footer/himalaya.jpeg')}}" class="fatmonk-img img-fluid">
             </center>
           </div> -->
         </div>
       </div>
     </section>
   </div>
 </div>
 </div>
 
 
 
 <script type="text/javascript">
 
 
 function Mocha_function() {
   var checkBox = document.getElementById("mocha_rating");
   var text = document.getElementById("mocha_click");
   if (checkBox.checked == true){
     text.style.display = "block";
   } else {
      text.style.display = "none";
   }
   
 }
 function Vanilla_function() {
   var checkBox = document.getElementById("vanilla_rating");
   var text = document.getElementById("vanilla_click");
   if (checkBox.checked == true){
     text.style.display = "block";
   } else {
      text.style.display = "none";
   }
 
   
 }
 
 function Mint_function() {
   var checkBox = document.getElementById("mint_rating");
   var text = document.getElementById("mint_click");
   if (checkBox.checked == true){
     text.style.display = "block";
 
     
   } else {
      text.style.display = "none";
   }
   
 }
 
 
 </script>
 

@endsection
