@extends('layouts.page')

@section('main')

	<div class="row almost-white-bg">
	
		@foreach($user->records as $record)
			@include('partials.record')
		@endforeach
		
		@include('partials.record-form')
	</div>
	
@stop