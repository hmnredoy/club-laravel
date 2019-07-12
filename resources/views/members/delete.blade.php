@extends('../../sidebars.admin')

@section('title', 'Dashboard')

@section('rightbar')

<!-- /. NAV SIDE  -->
<div id="page-wrapper">
    <div id="page-inner">
    	<div class="col-md-12">
	    	<div class="panel panel-danger">
	            <div class="panel-heading">
	               Delete Member
                   <div class="card-body pull-right">
                      <a href="/member" class="btn btn-secondary"><i class="fa fa-arrow-left"></i></a>
                   </div>
	            </div>

                @if(!empty($message))
                    <div style="padding: 5px 5px;">
                        <div class="{{session('style')}}">
                        {{session('message')}}
                        </div>  
                    </div>
                @endif

	            <div class="panel-body">      

                <div class="col-md-4">
                     <!--   Club Table  -->
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Joined Clubs
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>Club ID</th>
                                            <th>Club Name</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    @foreach ($clubInfo as $club)
                                        <tr>
                                            <td>{{$club->club_id}}</td>
                                            <td>{{$club->club_name}}</td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                      <!-- End  Basic Table  -->
                </div>

                    <div  class="col-md-8">
                        <div class="card-body pull-right">
                            <form method="post" action="/member/{{$userInfo->username}}/delete">
                                {{ csrf_field() }}
                                <input type="hidden" name="_method" value="delete">
                                <input class="btn btn-danger" type="submit" value="Confirm Delete">
                            </form>
                        </div>
                        <div class="card" style="width: 100%;">
                          <img src="/images/{{$userInfo->avatar}}" style="width: 200px;" class="card-img-top img-rounded" alt="User Profile Picture">
                          <div class="card-body">
                            <h5 class="card-title alert alert-info" style="width: 28%; text-align: center;">{{$userInfo->designation}}</h5>
                            <strong>Responsibility</strong>
                            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                          </div>
                          <ul class="list-group list-group-flush">
                            <li class="list-group-item">Username : <strong>{{$userInfo->username}}</strong></li>
                            <li class="list-group-item">Name : <strong>{{$userInfo->name}}</strong></li>
                            <li class="list-group-item">DOB : <strong>{{$userInfo->dob}}</strong></li>
                            <li class="list-group-item">Phone : <strong>{{$userInfo->phone}}</strong></li>
                            <li class="list-group-item">Email : <strong>{{$userInfo->email}}</strong></li>
                            <li class="list-group-item">Active Status : @if($userInfo->active_status == 'active')
                                                                        <div class="label label-success">{{$userInfo->active_status}}</div>
                                                                        @else
                                                                        <div class="label label-danger">{{$userInfo->active_status}}</div> 
                                                                        @endif
                            </li>
                            <li class="list-group-item">Join Date : <strong>{{$userInfo->join_date}}</strong></li>
                          </ul>
                          
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
  
@endsection