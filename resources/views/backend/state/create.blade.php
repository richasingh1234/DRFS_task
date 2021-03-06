@extends('layouts.app')

@section('content')
  
   <div class="container">
        <div class="row">
           <div class="col-md-4 p-3">
              <div class="d-flex d flex-column flex-md-row align-items-center p-3 px-md-4 mb-3 bg-white border-bottom shadow-sm">
                <div class="col-md-4">
                   <span class="dot"><string class="ml-3"><i class="fa fa-plus text-success"></i></string></span>
                </div>             
                <div class="col-md-8">
                   
                    <div class="form-group">
                      <input type="text" name="state" class="form-control" placeholder="Enter State Name">
                    </div>
                     <div class="form-group">
                       <input type="submit" name="name" class="btn btn-success">
                     </div>
                </div>
              </div>
           </div>
            <div class="col-md-4 p-3">
              <div class="d-flex d flex-column flex-md-row align-items-center p-3 px-md-4 mb-3 bg-white border-bottom shadow-sm" style="height: 200px;">
                <div class="col-md-4">
                   <span class="solid"><string class="ml-3 text-success"><i class="fa fa-plus"></i></string></span>
                </div>             
                <div class="col-md-6">   
                  <b class="text-success">Mau</b>
                  <p class="text-success">Uttar Pradesh</p>
                </div>
                  <div class="col-md-2"> 
                  <span class="text-success fa fa-arrow-right"></span>  
                </div>
              </div>
           </div>
           <div class="col-md-4 p-3">
              <div class="d-flex d flex-column flex-md-row align-items-center p-3 px-md-4 mb-3 bg-white border-bottom shadow-sm" style="height: 200px;">
                <div class="col-md-4">
                   <span class="solid"><string class="ml-3 text-success"><i class="fa fa-plus"></i></string></span>
                </div>             
                <div class="col-md-6">   
                  <b class="text-success">Kanpur</b>
                  <p class="text-success">Uttar Pradesh</p>
                </div>
                  <div class="col-md-2"> 
                  <span class="text-success fa fa-arrow-right"></span>  
                </div>
              </div>
           </div>
        </div>
         <div class="row">
             <div class="col-md-4 p-3">
              <div class="d-flex d flex-column flex-md-row align-items-center p-3 px-md-4 mb-3 bg-white border-bottom shadow-sm" style="height: 200px;">
                <div class="col-md-4">
                   <span class="solid"><string class="ml-3 text-success"><i class="fa fa-plus"></i></string></span>
                </div>             
                <div class="col-md-6">   
                  <b class="text-success">Garkhpur</b>
                  <p class="text-success">Uttar Pradesh</p>
                </div>
                  <div class="col-md-2"> 
                  <span class="text-success fa fa-arrow-right"></span>  
                </div>
              </div>
           </div>
            <div class="col-md-4 p-3">
              <div class="d-flex d flex-column flex-md-row align-items-center p-3 px-md-4 mb-3 bg-white border-bottom shadow-sm" style="height: 200px;">
                <div class="col-md-4">
                   <span class="solid"><string class="ml-3 text-success"><i class="fa fa-plus"></i></string></span>
                </div>             
                <div class="col-md-6">   
                  <b class="text-success">Maharajganj</b>
                  <p class="text-success">Uttar Pradesh</p>
                </div>
                  <div class="col-md-2"> 
                  <span class="text-success fa fa-arrow-right"></span>  
                </div>
              </div>
           </div>
        </div>
     </div>
@endsection
