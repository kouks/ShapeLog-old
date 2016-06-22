<?php

    /*
     * Parsing data
     */
	$data = unserialize($record->data);

    /*
     * Calculating his age
     */
    $time = strtotime($record->created_at);
    $bday = strtotime($user->birthday);
    $age = floor( ($time - $bday) / 86400 / 365.25 );

    /*
     * Calculating BMR
     */
    $bmr = $user->gender == "male" ? 
        round(66.5 + 13.75*$record->weight + 5.003*$record->height - 6.755*$age) :
        round(655.1 + 9.563*$record->weight + 1.850*$record->height - 4.676*$age);

?>
<div class="col-6 area-4 grid-item">
	<div class="record">
		
		{!! csrf_field() !!}

		<h4 class="theme-bg center light-grey-text area-2">
			<i class="fa fa-calendar" aria-hidden="pue"></i>
			{{ date('j. n. Y', strtotime($record->created_at)) }}
		</h4>

		<p class="title">basic info</p>
		
		<p class="row">
			<span>height</span>
			<span data-id="{{ $record->id }}" data-cat="height">{{ round($record->height, 1) }} cm</span>
			<input type="text" class="edit" />
		</p>
		<p class="row">
			<span>weight</span>
			<span data-id="{{ $record->id }}" data-cat="weight">{{ round($record->weight, 1) }} kg</span>
			<input type="text" class="edit" />
		</p>
		<p class="row">
			<span>age</span>
			<span>{{ $age }} years</span>
		</p>


		<p class="title">energy</p>

		<p class="row">
			<span>bmr</span>
			<span>{{ $bmr }} kcal</span>
		</p>
		<p class="row">
			<span>expenditure</span>
			<span>{{ $burn = round($bmr * $record->cal_level) }} kcal</span>
		</p>
		<p class="row">
			<span>intake</span>
			<span data-id="{{ $record->id }}" data-cat="kcal">{{ round($record->kcal) }} kcal ({{ abs($record->kcal - $burn) }} in {{ $record->kcal > $burn ? "surplus" : "deficit" }})</span>
			<input type="text" class="edit" />
		</p>

		<p class="title">Custom Tags</p>

		@foreach($user->tags as $tag)
			@if(@$data[$tag->name])
				<p class="row">
					<span>{{ $tag->name }}</span>
					<span data-id="{{ $record->id }}" data-cat="{{ $tag->name }}">{{ round($data[$tag->name], 1) }} {{ $tag->unit }}</span>
					<input type="text" class="edit" />
				</p>
			@else
				<p class="row">
					<span>{{ $tag->name }}</span>
					<span data-id="{{ $record->id }}" data-cat="{{ $tag->name }}">Not assigned</span>
					<input type="text" class="edit" />
				</p>
			@endif
		@endforeach

		@if(!empty($record->img))
			<p data-id="{{ $record->id }}" class="toggle-photo title">photo</p>

			<img style="display: none" id="{{ $record->id }}" src="/uploads/{{ $record->img }}" alt="Fotka Formy {{ $record->created_at }}">
		@endif
		
		<a href="/profile/delete/{{ $record->id }}" class="verify delete big light-grey-text"><i class="fa fa-times" aria-hidden="pue"></i></a>
	</div>
</div>