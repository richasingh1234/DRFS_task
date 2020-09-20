@extends('layouts.app')

@section('content')
  
   <div class="container">
        <div class="row">
            <div class="col-sm-12 text-center">
            @if(Session::has('message'))
            <p class="alert {{ Session::get('alert-class', 'alert-info') }}">{{ Session::get('message') }}</p>
            @endif
        </div>
           <div class="col-md-4 p-3">
              <div class="d-flex d flex-column flex-md-row align-items-center p-3 px-md-4 mb-3 bg-white border-bottom shadow-sm" style="height: 150px;">
                <div class="col-md-4">
                   <span class="dot"><string class="ml-3"><i class="fa fa-plus text-success"></i></string></span>
                </div>             
                <div class="col-md-8">
                    <form method="POST" action="{{route('state.store')}}">
                        @csrf
                    <div class="form-group">
                      <input type="text" name="state" class="form-control" placeholder="Enter State Name">
                    </div>
                     <div class="form-group">
                       <input type="submit" name="name" class="btn btn-success">
                     </div>
                        </form>
                </div>
              </div>
           </div>
            
            @foreach($state as $key => $states)
            <div class="col-md-4 p-3">
              <div class="d-flex d flex-column flex-md-row align-items-center p-3 px-md-4 mb-3 bg-white border-bottom shadow-sm" style="height: 150px;">
                <div class="col-md-4">
                   <span class="solid"><string class="ml-3 text-success"><i class="fa fa-plus"></i></string></span>
                </div>             
                <div class="col-md-6">   
                  <b class="text-success">{{$states->name}}</b>
                  
                </div>
                  <div class="col-md-2"> 
                  <span class="text-success fa fa-arrow-right"></span>  
                </div>
              </div>
           </div>
            @endforeach
           
            
            
        </div>
        
     </div>
@endsection
