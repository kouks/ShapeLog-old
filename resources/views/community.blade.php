@extends('layouts.page')

@section('main')

	<div class="row almost-white-bg">
		<div class="col-12 area-2">
			<h1 class="center">{{ trans('page.community.heading') }}</h1>			
		</div>
	</div>
	<div class="row white-bg">
		<div class="col-12 area-2">
			<p class="center big grey-text serif">{{ trans('page.community.desc') }}</p>
		</div>
	</div>

	<div class="row almost-white-bg">
		<div class="col-12 area-2">
			<input class="community-filter" type="text" placeholder="{{ trans('page.community.search') }}">
			{!! csrf_field() !!}

			<div class="results"></div>
		</div>
	</div>
	<div class="row white-bg">
		<div class="col-6 area-2">
			<h3 class="center area-2">{{ trans_choice('page.community.friend', 2) }}</h3>
			@foreach($follows as $member)
				<div class="col-6 area-2">
					@include('partials.member')
				</div>
			@endforeach
		</div>
		<div class="col-6 area-2">
			<h3 class="center area-2">{{ trans('page.community.newest') }}</h3>
			@foreach($newest as $member)
				<div class="col-6 area-2">
					@include('partials.member')
				</div>
			@endforeach
		</div>
	</div>
@stop