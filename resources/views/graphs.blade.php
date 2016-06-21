@extends('layouts.page')

@section('main')

	<div class="row almost-white-bg">
		<div class="col-12 area-2">
			<h1 class="center">Data graphing</h1>			
		</div>
	</div>
	<div class="row white-bg">
		<div class="col-12 area-2">
			<p class="center big grey-text">It is always motivating to see your body fat go down. Simply select what data you want to graph.</p>
		</div>
	</div>
	<div class="row almost-white-bg">
		<div class="col-12 area-2">
			<ul class="tag-list">
				@foreach($data as $record)
					@foreach($record["data"] as $cat=>$value)
						<li data-selected="0" data-cat="{{ strtoupper($cat) }}">{{ strtoupper($cat) }}</li>	
					@endforeach
					<? break; ?>
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