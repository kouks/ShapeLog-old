<?php

    /*
     * Parsing data
     */
	$data = unserialize($record->data);

    /*
     * Calculating his age
     */
    $time = strtotime($record->created_at);
    $age = floor( ($time - $record->user->birthday) / 86400 / 365.25 );

    /*
     * Calculating BMR
     */
    $bmr = BMR::get($age, $record->weight, $record->height, $record->user->gender, $record->user->metric);


?>

<div class="page-shadow">
	<div class="record" id="record-{{ $record->id }}">
		
		{!! csrf_field() !!}

		<h4 class="theme-bg center light-grey-text area-2">
			<i class="fa fa-calendar" aria-hidden="true"></i>
			{{ date('j. n. Y', strtotime($record->created_at)) }}
		</h4>

		<p class="title">{{ trans('page.records.basic') }}</p>
		
		<p class="row">
			<span>{{ trans('page.height') }}</span>
			<span data-id="{{ $record->id }}" data-cat="height">
				{{ round($record->height, 1) }} 
				{{ trans_choice('page.records.system.length', $record->user->metric) }}
			</span>
			<input type="text" class="edit" />
		</p>
		<p class="row">
			<span>{{ trans('page.weight') }}</span>
			<span data-id="{{ $record->id }}" data-cat="weight">
				{{ round($record->weight, 1) }} 
				{{ trans_choice('page.records.system.weight', $record->user->metric) }}
			</span>
			<input type="text" class="edit" />
		</p>
		<p class="row">
			<span>{{ trans('page.age') }}</span>
			<span>{{ $age }} {{ trans_choice('page.year', $age) }}</span>
		</p>


		<p class="title">{{ trans('page.records.energy') }}</p>

		<p class="row">
			<span>bmr</span>
			<span>{{ $bmr }} kcal</span>
		</p>
		<p class="row">
			<span>{{ trans('page.records.expenditure') }}</span>
			<span>{{ $burn = round($bmr * $record->cal_level) }} kcal</span>
		</p>
		<p class="row">
			<span>{{ trans('page.records.intake') }}</span>
			<span data-id="{{ $record->id }}" data-cat="kcal">
			{{ round($record->kcal) }} kcal ({{ abs($record->kcal - $burn) }} {{ trans('page.in') }} {{ $record->kcal > $burn ? trans_choice('page.records.surplus', 6) : trans_choice('page.records.deficit', 6) }})
			</span>
			<input type="text" class="edit" />
		</p>
		@if(count($record->user->tags) > 0)
			<p class="title">{{ trans('page.tags') }}</p>
		@endif

		@foreach($record->user->tags as $tag)
			@if(@$data[$tag->name])
				<p class="row">
					<span>{{ $tag->name }}</span>
					<span data-id="{{ $record->id }}" data-cat="{{ $tag->name }}">{{ round($data[$tag->name], 1) }} {{ $tag->unit }}</span>
					<input type="text" class="edit" />
				</p>
			@else
				<p class="row">
					<span>{{ $tag->name }}</span>
					<span data-id="{{ $record->id }}" data-cat="{{ $tag->name }}">
						{{ trans('page.not_assigned') }}
					</span>
					<input type="text" class="edit" />
				</p>
			@endif
		@endforeach

		@if(!empty($record->img))
			<p data-id="{{ $record->id }}" class="toggle-photo title">{{ trans('page.photo') }}</p>

			<img style="display: none" id="{{ $record->id }}" src="/uploads/{{ $record->img }}">
		@endif
		
		<i class="fa fa-times close" aria-hidden="true"></i>
	</div>
</div>