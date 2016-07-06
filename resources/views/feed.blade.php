@extends('layouts.page')

@section('main')

	<div class="row almost-white-bg">
		<div class="col-12 area-2">
			<h1 class="center">{{ trans('page.feed.heading') }}</h1>
		</div>
	</div>
	<div class="row white-bg">
		<div class="col-8 area-4 feed">
			@foreach($feed as $post)
				{{ $post->id }}
			@endforeach
		</div>
		<div class="col-2">&nbsp;</div>
	</div>

@stop