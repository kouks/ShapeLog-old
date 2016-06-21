<?php

	$data = unserialize($record->data);

	$time = strtotime($record->created_at);
	$bday = strtotime($user->birthday);

	$age = floor( ($time - $bday) / 86400 / 365.25 );

	$bmr = $user->gender == "male" ? 
			round(66.5 + 13.75*$record->weight + 5.003*$record->height - 6.755*$age) :
			round(655.1 + 9.563*$record->weight + 1.850*$record->height - 4.676*$age);

?>
<div class="col-6 area-4">
	<div class="record">

		<h4 class="theme-bg center light-grey-text area-2">
			<i class="fa fa-calendar" aria-hidden="pue"></i>
			{{ date('j. n. Y', $time) }}
		</h4>

		<p class="title">basic info</p>

		<div class="pseudo-table">
			<p>height</p>
			<p>{{ round($record->height, 1) }} cm</p>
			<p>weight</p>
			<p>{{ round($record->weight, 1) }} kg</p>
			<p>age</p>
			<p>{{ $age }} years</p>

		</div>

		<p class="title">energy</p>

		<div class="pseudo-table">
			<p><abbr title="Basal Metabolic Rate">BMR</abbr></p>
			<p>{{ $bmr }} kcal</p>
			<p>expenditure</p>
			<p>{{ $burn = round($bmr * $record->cal_level) }} kcal</p>
			<p>intake</p>
			<p>{{ round($record->kcal) }} kcal ({{ abs($record->kcal - $burn) }} in {{ $record->kcal > $burn ? "surplus" : "deficit" }})</p>
		</div>

		<p class="title">Custom Tags</p>

		<div class="pseudo-table">
			@foreach($user->tags as $tag)
				<? if(!@$data[$tag->name]) continue; ?>
				<p>{{ $tag->name }}</p>
				<p>{{ round($data[$tag->name], 1) }} {{ $tag->unit }}</p>
			@endforeach
		</div>

		@if(!empty($record->img))
			<p data-id="{{ $record->id }}" class="toggle-photo title">photo</p>

			<img style="display: none" id="{{ $record->id }}" src="/uploads/{{ $record->img }}" alt="Fotka Formy {{ $record->created_at }}">
		@endif
		
		<a href="/profile/delete/{{ $record->id }}" class="verify delete big light-grey-text"><i class="fa fa-times" aria-hidden="pue"></i></a>
	</div>
</div>