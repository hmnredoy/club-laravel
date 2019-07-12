@extends('../../sidebars.admin')

@section('title', 'Dashboard')

@section('rightbar')

<!--Custom links-->
<script src="{{asset('js/custom.js')}}"></script>

<div id="page-wrapper">
    <div id="page-inner">

	    @if(session('message'))
	    <div style="padding: 5px 5px;">
	        <div class="{{session('style')}}" role="alert">
              <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
              {{session('message')}}
            </div>
	    </div>
	    @endif
        <div class="row">
	        <div class="col-md-12">
	            <h1 class="page-head-line">Recently Joined Members</h1>
	            <h1 class="page-subhead-line">This is dummy text , you can replace it with your original text. </h1>
	        </div>
    	</div>

	    <div class="form-group">
	        <a href="/member/new" class="btn btn-success pull-right" style="margin-bottom: 10px;">Add Member</a>
	    </div>
	    <div class="table-responsive">
	    	<table class="table table-striped table-bordered table-hover">
			<tr>
				<th>Joined Club(s)</th>
				<th>Name</th>
				<th>DOB</th>
				<th>Phone</th>
				<th>Email</th>
				<th>Join Date</th>
				<th>Action</th>
			</tr>

			@foreach($userData as $user)

			<tr>
			 <td>
			 	@foreach($clubInfo as $club)
				 	@if($club->username == $user->username)

				 		@if($club->status == 'active')
			          	<span class="label label-success" style="display: block; margin: 3px 3px; font-size: 12px;">
			          		{{$club->club_name}}
			          	</span>
						
						@else
						<span class="label label-danger" style="display: block; margin: 3px 3px; font-size: 12px;">
			          		{{$club->club_name}}
			          	</span>
						@endif
			          
			   		@endif
		   		@endforeach

			 </td>
	  
	            <td>{{$user->name}}</td>
				<td>{{$user->dob}}</td>
				<td>{{$user->phone}}</td>
				<td>{{$user->email}}</td>
				<td>{{$user->join_date}}</td>
				<td>
					<a class="btn  btn-dark" href="/member/{{$user->username}}">Manage&nbsp;&nbsp;<i class="fa fa-cog"></i></a>
					<a class="btn btn-outline-secondary" href="/member/{{$user->username}}/delete">Remove Member</a>
				</td>
		      

			</tr>

			@endforeach

			</table>

			<div class="pull-right">
				{{ $userData->links() }}
			</div>
		</div>
	</div>
</div>


@endsection