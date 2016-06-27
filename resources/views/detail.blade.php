@extends('layouts.page')

@section('main')

	<div class="row almost-white-bg detail">
		<div class="col-3">&nbsp;</div>
		<div class="col-6 area-2 center">
		    <img class="profile-pic" src="//graph.facebook.com/{{ $detail->fbid }}/picture?width=500&height=500">
		    <h4 class="center dark-grey-text">{{ $detail->first_name }} {{ $detail->last_name }}</h4>
		    <h6 class="center grey-text">{{ '@' . $detail->username }}</h6>
		    <br />
			@if($user->id !== $detail->id)
				@if($user->hasFriend($detail->id))
					<a href="#" class="friend remove-friend" data-id="{{ $detail->id }}"><i class="fa fa-times" aria-hidden="true"></i> Remove friend</a>	
				@else
					<a href="#" class="friend add-friend" data-id="{{ $detail->id }}"><i class="fa fa-plus" aria-hidden="true"></i> Add friend</a>	
				@endif
				{!! csrf_field() !!}
			@endif

		</div>
		
		<div class="col-3">&nbsp;</div>	
	</div>

	<div class="row white-bg">
		<h2 class="center area-4">Records</h2>
	</div>
	<div class="row almost-white-bg">
		@foreach($detail->records as $record)
			<div class="col-3 area-2">
				<div data-id="{{ $record->id }}" class="theme-bg area-4 record-thumbnail">
					<h2 class="center light-grey-text"><i class="fa fa-calendar" aria-hidden="true"></i></h2>
					<h4 class="area-4 center light-grey-text">
						{{ date('j. n. Y', strtotime($record->created_at)) }}
					</h4>
				</div>
			</div>
		@endforeach	
	</div>

	<div class="row white-bg">
		<h2 class="center area-4">Data graphs</h2>
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

	<div>
		@foreach($detail->records as $record)
			@include('partials.record')
		@endforeach
	</div>
	
@stop