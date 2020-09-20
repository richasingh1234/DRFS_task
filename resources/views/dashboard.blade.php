@extends('layouts.app')

@section('content')


 <div class="container">
    <div class="d-flex flex-column flex-md-row align-items-center p-3 px-md-4 mb-3 bg-white border-bottom shadow-sm">
    <div class="container">
     <div class="row"style="width: 100%">
       <div class="col-md-4">
         <b>Name:</b> Jai Singh
       </div>
        <div class="col-md-4">
         <b>Orgination:</b> Hello
       </div>
        <div class="col-md-4">
          <b>Designation:</b> Clslsl
        </div>
       </div>
      </div>
     </div>
     </div>
   </div>
    <div class="container">
      <img src="{{ asset('assets/web_images/banner.jpeg') }}" width="100%">
    </div>

  @endsection