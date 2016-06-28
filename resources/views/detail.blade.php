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
					<a class="friend remove-friend" data-id="{{ $detail->id }}">
						<i class="fa fa-times" aria-hidden="true"></i> 
						{{ trans('page.community.detail.remove_friend') }}
					</a>	
					<a class="friend" style="display: none">
						{{ trans('page.community.detail.friend_removed') }}
					</a>
				@else
					<a class="friend add-friend" data-id="{{ $detail->id }}">
						<i class="fa fa-plus" aria-hidden="true"></i> 
						{{ trans('page.community.detail.add_friend') }}
					</a>
					<a class="friend" style="display: none">
						{{ trans('page.community.detail.friend_added') }}
					</a>	
				@endif
				{!! csrf_field() !!}
			@endif

		</div>
		
		<div class="col-3">&nbsp;</div>	
	</div>

	@if(count($detail->records->toArray()))
		<div class="row white-bg">
			<h2 class="center area-4">{{ trans('page.records.heading') }}</h2>
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
			<h2 class="center">{{ trans('page.graphs') }}</h2>	
		</div>
		<div class="row almost-white-bg">
			<div class="col-12 area-2">
				<ul class="tag-list">
				<li data-selected="0" data-cat="WEIGHT">{{ trans('page.weight') }}</li>
				<li data-selected="0" data-cat="KCAL">{{ trans('page.intake') }}</li>
					@foreach($user->tags as $tag)
						<li data-selected="0" data-cat="{{ strtoupper($tag->name) }}">
							{{ strtoupper($tag->name) }}
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

		<div>
			@foreach($detail->records as $record)
				@include('partials.record')
			@endforeach
		</div>
	@else
		<div class="row white-bg">
			<h2 class="center area-4">
				{{ trans_choice('page.community.detail.no_records', $detail->gender == 'male' ? 1 : 0, ['name' => $detail->first_name]) }}
			</h2>
		</div>
	@endif
	
@stop