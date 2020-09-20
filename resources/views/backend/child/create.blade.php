@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
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
                            <input type="text" name="child" class="form-control" placeholder="Name">
                        </div>
                        <div class="form-group">
                            <select class="form-control" name="sex">
                                <option value="">Sex</option>
                                <option value="Male">Male</option>
                                <option value="Female">Female</option>
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
                            <select class="form-control" name="state" id="state">
                                <option value="">State</option>
                                @foreach($state as $key => $states)
                                <option value="{{$states->id}}">{{$states->name}}</option>
                                @endforeach

                            </select>
                        </div>
                        <div class="form-group">
                            <select class="form-control" name="district" id="district">
                                <option value="">Disrict</option>


                            </select>
                        </div>
                        <div class="form-group">
                            <input type="file" name="profileImage" class="form-control">
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