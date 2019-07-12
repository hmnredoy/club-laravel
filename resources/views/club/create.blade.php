@extends('sidebars.admin')

@section('title', 'Dashboard')

@section('rightbar')

    <!--Custom links-->
    <script src="{{asset('js/custom.js')}}"></script>

    <div id="page-wrapper">
        <div id="page-inner">
            <div class="card-body pull-right">
                <a href="#" class="btn btn-secondary btn-lg"><i class="fa fa-arrow-left"></i></a>
            </div>
            <div class="col-md-6 col-sm-6 col-xs-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Add Club (ID: {{$new_club_id}})
                    </div>
                    @include('inc.message')

                    <div class="panel-body">
                        <form action="{{route('club.save')}}" method="post" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            <div class="form-group">
                                <label>Club Name</label>
                                <input class="form-control" type="text" name="club_name" value="{{old('club_name')}}">
                            </div>
                            <div class="form-group">
                                <label>Club Description</label>
                                <textarea class="form-control" name="description" value="{{old('description')}}"></textarea>
                            </div>
                            <div class="form-group">
                                <label>Associated Moderator</label>
                                <input class="form-control" type="text" name="moderator_name" value="{{old('moderator_name')}}">
                            </div>
                            <div class="form-group">
                                <label>Club Logo</label>
                                <input type="file" class="form-control" name="club_logo">
                            </div>
                            <input class="btn btn-success fadeIn fourth" type="submit" value="Create Club">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection
