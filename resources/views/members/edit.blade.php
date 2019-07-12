@extends('../../sidebars.admin')

@section('title', 'Dashboard')

@section('rightbar')

<!-- /. NAV SIDE  -->
<div id="page-wrapper">
    <div id="page-inner">
        <div class="card-body pull-right">
          <a href="/member/{{$userInfo->username}}" class="btn btn-secondary btn-lg"><i class="fa fa-arrow-left"></i></a>
        </div>
    	<div class="col-md-6 col-sm-6 col-xs-12">
	    	<div class="panel panel-default">
	            <div class="panel-heading">
	               Edit Member
	            </div>
	            @if(session('message'))
			    <div style="padding: 5px 5px;">
			        <div class="{{session('style')}}">
			        {{session('message')}}
			        </div>  
			    </div>
			    
			    @endif
			    
			    @if(count($errors) > 0)
			    <div class="alert alert-danger" style="margin: 5px 5px;">
				    @foreach ($errors->all() as $error)
					   {{ $error }}<br>
					@endforeach
				</div>	
			    @endif			    	
			    

			  
	            <div class="panel-body">
	                <form action="/member/{{$userInfo->id}}/edit" method="post">
	                {{ csrf_field() }}
                    <input type="hidden" name="_method" value="put">
                    <input type="hidden" name="username" value="{{$userInfo->username}}">

                        <div class="form-group">
                            <label>Username</label>
                            <input class="form-control" type="text" name="username" value="{{$userInfo->username}}" readonly>
                        </div>
                        <div class="form-group">
                            <label>Name</label>
                            <input class="form-control" type="text" name="name" value="{{$userInfo->name}}">
                        </div>
                        <div class="form-group">
                            <label>Gender</label>
                            <div class="radio">
                                <label>
                                    <input type="radio" name="gender" id="optionsRadios1" value="Male"@if($userInfo->gender == 'Male') checked @endif>Male
                                </label>
                            </div>
                            <div class="radio">
                                <label>
                                    <input type="radio" name="gender" id="optionsRadios2" value="Female" @if($userInfo->gender == 'Female') checked @endif>Female
                                </label>
                            </div> 
                            <div class="radio">
                                <label>
                                    <input type="radio" name="gender" id="optionsRadios2" value="Other" @if($userInfo->gender == 'Other') checked @endif>Other
                                </label>
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Designation</label>
                            <input class="form-control" type="text" name="designation" value="{{$userInfo->designation}}" placeholder="Optional">
                        </div>
                        <div class="form-group">
                            <label>Date of Birth</label>
                            <input class="form-control custom_resize" type="date" name="dob" value="{{$userInfo->dob}}">
                        </div>
                        <div class="form-group">
                            <label>Phone Number</label>
                            <input class="form-control" type="text" name="phone" value="{{$userInfo->phone}}">
                        </div>
                        <div class="form-group">
                            <label>Email</label>
                            <input class="form-control" type="text" name="email" value="{{$userInfo->email}}">
                        </div>
                        <input class="btn btn-success fadeIn fourth" type="submit" value="Update">
	                </form>
	            </div>
	        </div>
        </div>
    </div>
</div>

@endsection