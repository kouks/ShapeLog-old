@extends('layouts.page')

@section('main')

	<div class="row almost-white-bg">
		<div class="col-12 area-2">
			<h1 class="center">{{ trans('page.graphs.heading') }}</h1>
		</div>
	</div>
	<div class="row white-bg">
		<div class="col-12 area-2">
			<p class="center big grey-text serif">{{ trans('page.graphs.desc') }}</p>
		</div>
	</div>
	<div class="row almost-white-bg">
		<div class="col-12 area-2">
			<ul class="tag-list">
				<li data-selected="0" data-cat="WEIGHT">{{ trans('page.weight') }}</li>
				<li data-selected="0" data-cat="KCAL">{{ trans('page.intake') }}</li>
				@foreach($user->tags as $tag)
					<li data-selected="0" data-cat="{{ strtoupper($tag->name) }}">
						{{ $tag->name }}
					</li>	
				@endforeach
			</ul>
		</div>
	</div>
	<div class="row white-bg">
		<div class="col-12 area-2">
        	<canvas id="graph"></canvas>
        </div>
    </div>

	<script>
		var data = <?php echo json_encode($data); ?>;

		draw(data, []);
	</script>

@stop