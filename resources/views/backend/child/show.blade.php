@extends('layouts.app')

@section('content')

<div class="container card bg-gray">
         <div class="row">
           <div class="col-sm-1 mt-2">
             <a href=""><i class="fa fa-arrow-left text-success"></i></a>
           </div>
           <div class="col-sm-8 pt-5">
               <img src="{{ asset('assets/web_images/banner.jpeg') }}" class="rounded-circle mx-auto" width="100px" height="100px">
           </div>
           <div class="col-sm-3"></div>
         </div>
         <div class="row pt-5">
           <div class="col-sm-4">
            <b>Name:</b> <p>Jai Singh</p>
           </div>
           <div class="col-sm-4">
              <b>sex:</b> <p>Male</p>
           </div>
           <div class="col-sm-4">
              <b>Date of Borth:</b> <p>00-05-0000</p>
           </div>
        </div>
        <div class="row">
           <div class="col-sm-4">
            <b>Father's Name:</b> <p>sfskks</p>
           </div>
           <div class="col-sm-4">
              <b>Mother's Name:</b> <p>hhfhsd</p>
           </div>
           <div class="col-sm-4">
              <b>State:</b> <p>Uttar Pradesh</p>
           </div>
         </div>
          <div class="row">
           <div class="col-sm-4">
            <b>District:</b> <p>Gorakhpur</p>
           </div>
           <div class="col-sm-4">
             
           </div>
           <div class="col-sm-4">
             
           </div>
       </div>
     </div>
  </div>
  
  @endsection