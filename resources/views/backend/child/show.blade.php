@extends('layouts.app')

@section('content')

<div class="container card bg-gray">
         <div class="row">
           <div class="col-sm-1 mt-2">
             <a href="{{route('child.index')}}"><i class="fa fa-arrow-left text-success"></i></a>
           </div>
           <div class="col-sm-8 pt-5">
               <img src="{{ asset('../../storage//profileImage')}}/{{ $child->profileImage }}" class="rounded-circle mx-auto" width="100px" height="100px">
           </div>
           <div class="col-sm-3"></div>
         </div>
         <div class="row pt-5">
           <div class="col-sm-4">
            <b>Name:</b> <p>{{$child->name}}</p>
           </div>
           <div class="col-sm-4">
              <b>sex:</b> <p>{{$child->sex}}</p>
           </div>
           <div class="col-sm-4">
              <b>Date of Birth:</b> <p>{{$child->dateOfBirth}}</p>
           </div>
        </div>
        <div class="row">
           <div class="col-sm-4">
            <b>Father's Name:</b> <p>{{$child->fatherName}}</p>
           </div>
           <div class="col-sm-4">
              <b>Mother's Name:</b> <p>{{$child->motherName}}</p>
           </div>
           <div class="col-sm-4">
              <b>State:</b> <p>{{$child->state->name}}</p>
           </div>
         </div>
          <div class="row">
           <div class="col-sm-4">
            <b>District:</b> <p>{{$child->district->name}}</p>
           </div>
           <div class="col-sm-4">
             
           </div>
           <div class="col-sm-4">
             
           </div>
       </div>
     </div>
  </div>
  
  @endsection