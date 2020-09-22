@extends('layouts.app')

@section('content')
<style>
    .error{
        color:red;
    }
</style>    
    
<div class="container">
    <div class="row">
        <div class="col-sm-12 text-center">
            @if(Session::has('message'))
            <p class="alert {{ Session::get('alert-class', 'alert-info') }}">{{ Session::get('message') }}</p>
            @endif
        </div>
        <div class="col-sm-4"></div>
        <div class="col-sm-4">
            <div class="card">
                <form method="POST" action="{{route('child.store')}}" enctype="multipart/form-data">
                    @csrf
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
                            <input type="text" name="child" value="{{ old('child') }}" class="form-control" placeholder="Name">
                            @if ($errors->has('child'))
                            <label for="child" class="error">{{ $errors->first('child') }}</label> 
                            @endif
                        </div>
                        <div class="form-group">
                            <select class="form-control" name="sex">
                                <option value="">Sex</option>
                                <option value="Male" {{ old('sex') == 'Male' ? 'selected' : '' }}>Male</option>
                                <option value="Female" {{ old('sex') == 'Female' ? 'selected' : '' }}>Female</option>
                            </select>
                            @if ($errors->has('sex'))
                            <label for="sex" class="error">{{ $errors->first('sex') }}</label> 
                            @endif
                        </div>
                        <div class="form-group">
                            <input type="date" name="dob" class="form-control" placeholder="Date of Birth" value="{{ old('dob') }}">
                            @if ($errors->has('dob'))
                            <label for="dob" class="error">{{ $errors->first('dob') }}</label> 
                            @endif
                        </div>
                        <div class="form-group">
                            <input type="text" name="fathername" class="form-control" placeholder="Father's name" value="{{ old('fathername') }}">
                            @if ($errors->has('fathername'))
                            <label for="child" class="error">{{ $errors->first('fathername') }}</label> 
                            @endif
                        </div>
                        <div class="form-group">
                            <input type="text" name="mothername" class="form-control" placeholder="Mother's name" value="{{ old('mothername') }}">
                            @if ($errors->has('mothername'))
                            <label for="mothername" class="error">{{ $errors->first('mothername') }}</label> 
                            @endif
                        </div>
                        <div class="form-group">
                            <select class="form-control" name="state" id="state">
                                <option value="">State</option>
                                @foreach($state as $key => $states)
                                <option value="{{$states->id}}">{{$states->name}}</option>
                                @endforeach

                            </select>
                            @if ($errors->has('state'))
                            <label for="state" class="error">{{ $errors->first('state') }}</label> 
                            @endif
                        </div>
                        <div class="form-group">
                            <select class="form-control" name="district" id="district">
                                <option value="">Disrict</option>


                            </select>
                            @if ($errors->has('district'))
                            <label for="district" class="error">{{ $errors->first('district') }}</label> 
                            @endif
                        </div>
                        <div class="form-group">
                            <input type="file" name="profileImage" class="form-control" value="{{ old('profileImage') }}">
                            @if ($errors->has('profileImage'))
                            <label for="profileImage" class="error">{{ $errors->first('profileImage') }}</label> 
                            @endif
                        </div>
                        <div class="form-group">
                            <input type="submit" name="submit" value="Submit" class="btn btn-block btn-sm btn-success">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="col-sm-4"></div><br>
</div>
</div>
</div>


<script type=text/javascript>

    $('#state').on('change', function () {

        var stateID = $(this).val();
        if (stateID) {
            $.ajax({
                type: "GET",
                url: "{{url('get-District-list')}}?state_id=" + stateID,
                success: function (res) {
                    if (res) {
                        $("#district").empty();
                        $.each(res, function (key, value) {
                            $("#district").append('<option value="">Disrict</option><option value="' + key + '">' + value + '</option>');
                        });

                    } else {
                        $("#district").empty();
                    }
                }
            });
        } else {
            $("#district").empty();
        }

    });
</script>

@endsection