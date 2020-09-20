@extends('layouts.app')

@section('content')

<div class="container">
       <div class="row">
         <div class="col-sm-4"></div>
         <div class="col-sm-4">
           <div class="card">
              <div class="card-body">
                <div class="row">
                  <div class="col-sm-2">
                   <a href=""><i class="fa fa-arrow-left text-success"></i></a>
                  </div>
                  <div class="col-sm-10 text">
                   <h4 class="text-success"> Add Child</h4>
                  </div>
                </div><hr>
               
                  <div class="form-group">
                  <input type="text" name="name" class="form-control" placeholder="Name">
                  </div>
                   <div class="form-group">
                   <select class="form-control">
                     <option value="">Sex</option>
                     <option value="">Male</option>
                     <option value="">Female</option>
                   </select>
                  </div>
                  <div class="form-group">
                  <input type="date" name="dob" class="form-control" placeholder="Date of Birth">
                  </div>
                  <div class="form-group">
                  <input type="text" name="fathername" class="form-control" placeholder="Father's name">
                  </div>
                  <div class="form-group">
                  <input type="text" name="mothername" class="form-control" placeholder="Mother's name">
                  </div>
                  <div class="form-group">
                   <select class="form-control">
                     <option value="">State</option>
                     
                   </select>
                  </div>
                   <div class="form-group">
                   <select class="form-control">
                     <option value="">Disrict</option>
                     
                   </select>
                  </div>
                  <div class="form-group">
                    <input type="file" name="image" class="form-control">
                  </div>
                  <div class="form-group">
                    <input type="submit" name="submit" value="Submit" class="btn btn-block btn-sm btn-success">
                  </div>
                </div>
              </div>
           </div>
         </div>
         <div class="col-sm-4"></div><br>
       </div>
     </div>
  </div>
  
  @endsection