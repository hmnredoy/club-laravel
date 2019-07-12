@extends('../../sidebars.admin')

@section('title', 'Dashboard')

@section('rightbar')

<!-- /. NAV SIDE  -->
<div id="page-wrapper">
    <div id="page-inner">
        <div class="card-body pull-right">
          <a href="/member" class="btn btn-secondary btn-lg"><i class="fa fa-arrow-left"></i></a>
        </div>
    	<div class="col-md-6 col-sm-6 col-xs-12">
	    	<div class="panel panel-default">
	            <div class="panel-heading">
	               Add Member
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
	                <form action="{{route('member.save')}}" method="post" enctype="multipart/form-data">
	                {{ csrf_field() }}       
	                    <div class="form-group">
                            <label>Select Clubs</label>
                            @foreach ($clubData as $club)
  	                        <div class="checkbox">
                                <label>
                                    <input type="checkbox" value="{{$club->club_id}}" name="club[]">{{$club->club_name}}
                                </label>
                            </div>
							@endforeach
 
                        </div>
                        <div class="form-group">
                            <label>Enter Username</label>
                            <input class="form-control" type="text" name="username" value="{{old('username')}}">
                        </div>
                        <div class="form-group">
                            <label>Enter Name</label>
                            <input class="form-control" type="text" name="name" value="{{old('name')}}">
                        </div>
                        <div class="form-group">
                            <label>Gender</label>
                            <div class="radio">
                                <label>
                                    <input type="radio" name="gender" id="optionsRadios1" value="Male" checked="">Male
                                </label>
                            </div>
                            <div class="radio">
                                <label>
                                    <input type="radio" name="gender" id="optionsRadios2" value="Female">Female
                                </label>
                            </div> 
                            <div class="radio">
                                <label>
                                    <input type="radio" name="gender" id="optionsRadios2" value="Other">Other
                                </label>
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Enter Designation <span style="color: #b3b3b3; font-family:  Segoe Ul,Lato,ROBOTO,helvetica,'Raleway', sans-serif;">Default : General Member</span></label>
                            <input class="form-control" type="text" name="designation" value="{{old('designation')}}" placeholder="Optional">
                        </div>
                        <div class="form-group">
                            <label>Enter Date of Birth</label>
                            <input class="form-control" type="date" name="dob" value="old('date', date('d/m/Y'))">
                        </div>
                        <div class="form-group">
                            <label>Enter Phone Number</label>
                            <input class="form-control" type="text" name="phone" value="{{old('phone')}}">
                        </div>
                        <div class="form-group">
                            <label>Enter Email</label>
                            <input class="form-control" type="text" name="email" value="{{old('email')}}">
                        </div>
                        <div class="form-group">
                            <label>Enter Password</label>
                            <input class="form-control" type="password" name="password">
                        </div>
                        <div class="form-group">
                            <label>Choose an avatar</label>
                            <input type="file" class="form-control" name="image">
                        </div>
                        <input class="btn btn-success fadeIn fourth" type="submit" value="Add Now">
	                </form>
	            </div>
	        </div>
        </div>
    </div>
</div>

@endsection