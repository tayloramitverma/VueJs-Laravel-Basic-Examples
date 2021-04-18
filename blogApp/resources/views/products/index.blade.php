@extends('base')

@section('main')
<div class="row">

	<div class="col-sm-12">

	  @if(session()->get('success'))
	    <div class="alert alert-success">
	      {{ session()->get('success') }}  
	    </div>
	  @endif
	  
	</div>

</div>
@endsection	