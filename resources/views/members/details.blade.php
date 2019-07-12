@extends('../../sidebars.admin')

@section('title', 'Dashboard')

@section('rightbar')

<script src="{{asset('js/custom.js')}}"></script>

<!-- /. NAV SIDE  -->
<div id="page-wrapper">
    <div id="page-inner">
    	<div class="col-md-12">
	    	<div class="panel panel-default">
	            <div class="panel-heading">
	               Member Details
                   <div class="card-body pull-right">
                      <a href="/member" class="btn btn-secondary btn-lg"><i class="fa fa-arrow-left"></i></a>
                   </div>
	            </div>

                @include('inc.message')
	            <div class="panel-body">      

                <div class="col-md-6">
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
                                            <th>Status</th>
                                            <th colspan="2" align="center">Action</th>
                                            
                                        </tr>
                                    </thead>
                                    <tbody>
                                    @foreach ($clubInfo as $club)
                                        <tr>
                                            <td>{{$club->club_id}}</td>
                                            <td>{{$club->club_name}}</td>
                                            <td>
                                                @if($club->status == 'active')
                                                <div class="label label-success">{{$club->status}}</div>
                                                @else
                                                <div class="label label-danger">{{$club->status}}</div>
                                                @endif
                                            </td>
                                            <td>
                                                <form method="post" action="/member/{{$userInfo->username}}">
                                                    <input type="hidden" name="_method" value="put">
                                                    <input type="hidden" name="username" value="{{$userInfo->username}}">
                                                    <input type="hidden" name="club_id" value="{{$club->club_id}}">
                                                    <input type="hidden" name="action" value="club_remove">
                                                    {{ csrf_field() }}
                                                    <button type="submit" class="btn btn-outline-danger"><i class="fa fa-times"></i></button>
                                               
                                                </form>
                                            </td>
                                            <td>
                                                <form method="post" action="/member/{{$userInfo->username}}">
                                                    <input type="hidden" name="_method" value="put">
                                                    {{ csrf_field() }}
                                                    <input type="hidden" name="username" value="{{$userInfo->username}}">
                                                    <input type="hidden" name="club_id" value="{{$club->club_id}}">
                                                    @if($club->status == 'active')
                                                    <input type="hidden" name="action" value="deactivate_user_from_club">
                                                    <input class="btn btn-outline-danger" type="submit" value="Deactivate">
                                                    @else
                                                    <input type="hidden" name="action" value="activate_user_from_club">
                                                    <input class="btn btn-outline-success" type="submit" value="Activate">
                                                    @endif
                                                </form>
                                            
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                           
                                <button type="button" class="btn btn-info" data-toggle="collapse" data-target="#club_info">Assign to a Club</button>
                                <div id="club_info" class="collapse">
                                    <table class="table">
                                    <thead>
                                        <tr>
                                            <th>Club ID</th>
                                            <th>Club Name</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    @foreach ($clubList as $club)
                                        <tr>
                                            <td>{{$club->club_id}}</td>
                                            <td>{{$club->club_name}}</td>
                                            <td>
                                                <form method="post" action="/member/{{$userInfo->username}}">
                                                    <input type="hidden" name="_method" value="put">
                                                    <input type="hidden" name="username" value="{{$userInfo->username}}">
                                                    <input type="hidden" name="club_id" value="{{$club->club_id}}">
                                                    <input type="hidden" name="action" value="club_assign">
                                                    {{ csrf_field() }}
                                                    <input class="btn btn-info" type="submit" value="Assign">
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                      <!-- End  Basic Table  -->
                </div>

                    <div class="col-md-6">
                        <div class="card-body pull-right">
                            <table class="table">
                                <tr>
                                    <td>
                                        <a href="/member/{{$userInfo->username}}/edit" type="button" class="btn btn-dark btn-lg">Edit&nbsp;&nbsp;<i class="fa fa-pencil-square-o"></i></a>
                                    </td>
                                    <td>
                                        <a href="/member/{{$userInfo->username}}/message" type="button" class="btn btn-dark btn-lg">Send Message&nbsp;&nbsp;<i class="fa fa-envelope-o"></i></a>
                                    </td>
                                </tr>
                            </table>

                        </div>
                        <div class="card" style="width: 100%;">
                            <img src="/images/{{$userInfo->avatar}}" style="width: 200px;" class="card-img-top img-rounded" alt="User Profile Picture">
                            <span class="card-title label label-primary" style="font-size: 1.3rem; width: 38%; text-align: center; display: block; margin: 5px 0px;">{{$userInfo->designation}}</span>


<!------------------------------------------Update Image---------------------------------------->

                        <form action="/member/{{$userInfo->username}}" method="post" enctype="multipart/form-data">
                            <input type="hidden" name="_method" value="put">
                            {{ csrf_field() }}
                            <input type="hidden" name="username" value="{{$userInfo->username}}">
                            <input type="hidden" name="avatar" value="{{$userInfo->avatar}}">
                            <input type="hidden" name="action" value="change_image">

                            <div class="input-group">
                              <div class="custom-file"  style="width: 80%;">
                                <input type="file" class="custom-file-input" id="inputGroupFile04" name="image">
                                <label class="custom-file-label" for="inputGroupFile04">Choose image</label>
                              </div>
                              <div class="input-group-append">
                                <button type="submit" class="btn btn-secondary" style="width: 80%;">Upload</button>
                              </div>
                            </div>
                        </form>

<!-----------------------------------------------End--------------------------------------------->
                        <div class="card-body">
                            <strong>Responsibility</strong>
                            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                        </div>
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item">Username : <strong>{{$userInfo->username}}</strong></li>
                            <li class="list-group-item">Name : <strong>{{$userInfo->name}}</strong></li>
                            <li class="list-group-item">Gender : <strong>{{$userInfo->gender}}</strong></li>
                            <li class="list-group-item">DOB : <strong>{{$userInfo->dob}}</strong></li>
                            <li class="list-group-item">Phone : <strong>{{$userInfo->phone}}</strong></li>
                            <li class="list-group-item">Email : <strong>{{$userInfo->email}}</strong></li>
                            <li class="list-group-item">Join Date : <strong>{{$userInfo->join_date}}</strong></li>
                            <li class="list-group-item">Active Status : 
                                                                        <form method="post" action="/member/{{$userInfo->username}}" style="display: inline;">
                                                                        <input type="hidden" name="_method" value="put">
                                                                        {{ csrf_field() }}
                                                                        <input type="hidden" name="username" value="{{$userInfo->username}}">
                                                                        
                                                                        @if($userInfo->active_status == 'active')
                                                                        <div class="label label-success">{{$userInfo->active_status}}</div>
                                                                        <div class="pull-right">
                                                                        <input type="hidden" name="active_status" value="inactive">
                                                                        <input class="btn btn-danger" type="submit" value="Deactivate">
                                                                        </div>
                                                                
                                                                        @else
                                                                        <div class="label label-danger">{{$userInfo->active_status}}</div>
                                                                        <div class="pull-right">
                                                                        <input type="hidden" name="active_status" value="active">
                                                                        <input class="btn btn-success" type="submit" value="Activate">
                                                                        </div>
                                                                        @endif
                                                                        </form>
                            </li>
                            
                          </ul>

                          <ul class="list-group list-group-flush">
                            <li class="list-group-item">Joined Event</li>
                          </ul>
                          
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
  
@endsection