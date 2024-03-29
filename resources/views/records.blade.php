@extends('layouts.page')

@section('main')

	<div class="row almost-white-bg">
		<div class="col-12 area-2">
			<h1 class="center">{{ trans('page.records.heading') }}</h1>			
		</div>
	</div>
	<div class="row white-bg">
		<div class="col-12 area-2">
			<p class="center big grey-text serif">{{ trans('page.records.desc') }}</p>
		</div>
	</div>
	<div class="row almost-white-bg">
		
		<div class="col-3 area-2">
			<div class="new-record area-4">
				<h2 class="center"><i class="fa fa-plus" aria-hidden="true"></i></h2>
				<h4 class="area-4 center">
					{{ trans('page.records.new') }}
				</h4>
			</div>
		</div>

		@foreach($user->records as $record)
			<div class="col-3 area-2">
				<div data-id="{{ $record->id }}" class="theme-bg area-4 record-thumbnail">
					<h2 class="center light-grey-text"><i class="fa fa-calendar" aria-hidden="true"></i></h2>
					<h4 class="area-4 center light-grey-text">
						{{ date('j. n. Y', strtotime($record->created_at)) }}
					</h4>
					<a href="/profile/records/delete/{{ $record->id }}" class="verify delete big light-grey-text"><i class="fa fa-times" aria-hidden="true"></i></a>
				</div>
			</div>
		@endforeach
		
	</div>
	
	<div class="editable">
		@include('partials.record-form')

		@foreach($user->records as $record)
			@include('partials.record')
		@endforeach
	</div>
@stop

<!--
-->