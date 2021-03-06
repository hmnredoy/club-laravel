@if(session('message'))
<div style="padding: 5px 5px;">
    <div class="{{session('style')}}" role="alert">
      <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
      {{session('message')}}
    </div>
</div>
@endif




@if(!empty($success_login))
   <div class="alert alert-success" role="alert">
      <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
      {{$success_login}}
    </div>
@endif

@if(count($errors) > 0)
    <div class="alert alert-danger" style="margin: 5px 5px;">
        @foreach ($errors->all() as $error)
            {{ $error }}<br>
        @endforeach
    </div>
@endif

