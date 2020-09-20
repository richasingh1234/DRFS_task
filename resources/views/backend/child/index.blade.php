@extends('layouts.app')

@section('content')
  
     <div class="container">
      <div class="row">
        <div class="col-sm-12 text-right">
          <a href="{{route('child.create')}}" class="btn btn-success btn-sm"><i class="fa fa-plus"></i> Add Child</a>
        </div>
      </div>
       <br>
       <div class="d-flex flex-column flex-md-row align-items-center p-3 px-md-4 mb-3 bg-white border-bottom shadow-sm">
        <div class="table-responsive">
          <table id="example" class="table table-bordered">
            <thead>
              <tr>
                 <th>Name</th>
                 <th>Sex</th>
                 <th>Date of Birth</th>
                 <th>Father's Name</th>
                 <th>Mother's Name</th>
                 <th>State</th>
                 <th>District</th>
                 <th>Action</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td>Jai Singh</td>
                <td>Male</td>
                <td>27-05-1996</td>
                <td>demo</td>
                <td>demo</td>
                <td>Uttar Pradesh</td>
                <td>Mau</td>
                <td><a href="{{route('child.show',1)}}" class="btn btn-outline-success">View</a></td>
              </tr>
            </tbody>
          </table>
        </div> 
       </div>
     </div>

@endsection