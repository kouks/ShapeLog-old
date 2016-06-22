@extends('layouts.page')

@section('main')

	<div class="row almost-white-bg">
		<div class="col-12 area-2">
			<h1 class="center">Listing of records</h1>			
		</div>
	</div>
	<div class="row white-bg">
		<div class="col-12 area-2">
			<p class="center big grey-text">On this page, you can find all the records that you have ever added, as well as edit them by simply clicking on any value, rewrting it and pressing enter.</p>
		</div>
	</div>
	<div class="row almost-white-bg">
	

		@foreach($user->records as $record)
			@include('partials.record')
		@endforeach
		
		@include('partials.record-form')

	</div>
	
@stop