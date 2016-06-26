@extends('layouts.page')

@section('main')

	<div class="row almost-white-bg">
		<div class="col-12 area-2">
			<h1 class="center">Community page</h1>			
		</div>
	</div>
	<div class="row white-bg">
		<div class="col-12 area-2">
			<p class="center big grey-text serif">Meet up with your friends and check their progress, too.</p>
		</div>
	</div>

	<div class="row almost-white-bg">
		<div class="col-12 area-2">
			<input class="community-filter" type="text" placeholder="Look up people">
			{!! csrf_field() !!}

			<div class="results"></div>
		</div>
	</div>
	<div class="row white-bg">
		<div class="col-6 area-2">
			<h3 class="center area-2">Friends</h3>
		</div>
		<div class="col-6 area-2">
			<h3 class="center area-2">Newest</h3>
			@foreach($newest as $member)
				<div class="col-6 area-2">
					@include('partials.member')
				</div>
			@endforeach
		</div>
	</div>
@stop