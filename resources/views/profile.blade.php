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
		
		<div class="col-3 area-2">
			<div class="new-record area-4">
				<h2 class="center"><i class="fa fa-plus" aria-hidden="pue"></i></h2>
				<h4 class="area-4 center">
					New record
				</h4>
			</div>
		</div>

		@foreach($user->records as $record)
			<div class="col-3 area-2">
				<div data-id="{{ $record->id }}" class="theme-bg area-4 record-thumbnail">
					<h2 class="center light-grey-text"><i class="fa fa-calendar" aria-hidden="pue"></i></h2>
					<h4 class="area-4 center light-grey-text">
						{{ date('j. n. Y', strtotime($record->created_at)) }}
					</h4>
					<a href="/profile/delete/{{ $record->id }}" class="verify delete big light-grey-text"><i class="fa fa-times" aria-hidden="pue"></i></a>
				</div>
			</div>
		@endforeach
		
	</div>
	
	<div>
		@include('partials.record-form')

		@foreach($user->records as $record)
			@include('partials.record')
		@endforeach
	</div>
@stop

<!--
-->