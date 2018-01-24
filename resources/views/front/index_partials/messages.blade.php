
@if(Session::has('message'))
<div class="col-md-12">
<div class="alert alert-success text-center">
	<p>{{ Session::get('message') }}</p>
</div>

</div>
@endif

@if(Session::has('error'))
	<div class="col-md-12">
		<div class="alert alert-danger text-center">
			<p>{{ Session::get('error') }}</p>
		</div>

	</div>
@endif


@if (count($errors) > 0)
	<div class="col-md-12">
	<div class="alert alert-danger">
		<ul>
			@foreach ($errors->all() as $error)
				<li>{{ $error }}</li>
			@endforeach
		</ul>
	</div>
	</div>
@endif