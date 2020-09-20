@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-4 p-3">
            <div class="d-flex d flex-column flex-md-row align-items-center p-3 px-md-4 mb-3 bg-white border-bottom shadow-sm">
                <div class="col-md-4">
                    <span class="dot"><string class="ml-3"><i class="fa fa-plus text-success"></i></string></span>
                </div>        
                <form method="POST" action="{{route('district.store')}}">
                    @csrf
                    <div class="col-md-8">
                        <div class="form-group">
                            <select class="form-control" name="state">
                                <option value="">Select State Name</option>
                                @foreach($state as $key => $states)
                                <option value="{{$states->id}}">{{$states->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <input type="text" name="district" class="form-control" placeholder="Enter District Name">
                        </div>
                        <div class="form-group">
                            <input type="submit" name="name" class="btn btn-success">
                        </div>
                    </div>
                </form>
            </div>
        </div>
        
        @foreach($district as $key => $districts)
        <div class="col-md-4 p-3">
            <div class="d-flex d flex-column flex-md-row align-items-center p-3 px-md-4 mb-3 bg-white border-bottom shadow-sm" style="height: 200px;">
                <div class="col-md-4">
                    <span class="solid"><string class="ml-3 text-success"><i class="fa fa-plus"></i></string></span>
                </div>             
                <div class="col-md-6">   
                    <b class="text-success">Kanpur</b>
                    <p class="text-success">{{$districts->name}}</p>
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
