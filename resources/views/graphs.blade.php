@extends('layouts.page')

@section('main')

	<div class="row almost-white-bg">
		<div class="col-12 area-2">
			<h1 class="center">Data graphing</h1>			
		</div>
	</div>
	<div class="row white-bg">
		<div class="col-12 area-2">
			<h3>Choose your data to graph</h3>
			@foreach($data as $record)
				@foreach($record["data"] as $cat=>$_)
					<input {{ $cat == "weight" ? "checked='checked'" : "" }} class="change"  name="cat" type="radio" data-cat="{{ $cat }}" />
					{{ strtoupper($cat) }}
					<br />
				@endforeach
				<? break; ?>
			@endforeach
		</div>
	</div>
	<div class="row almost-white-bg">
		<div class="col-12 area-2">
        	<canvas id="canvas"></canvas>
        </div>
    </div>

	<script>
		var data = <?php echo json_encode($data); ?>;

		draw(data, 'weight');

		$(document).ready(function() {
			$('.change').change(function() {
				draw(data, $(this).data('cat'));
			});
		});
	</script>

@stop