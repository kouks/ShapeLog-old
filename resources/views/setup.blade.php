@extends('layouts.empty')

@section('main')

	<div class="row almost-white-bg">
		<div class="col-12 area-2">
			<h1 class="center">Just a few more details</h1>			
		</div>
	</div>
	<div class="row white-bg">
		<div class="col-12 area-2">
			<p class="center big grey-text serif">We will ask you for some more information so we can personalize the interface even more. We require your birthday so we can accurately calculate your BMR.</p>
		</div>
	</div>

	<div class="row almost-white-bg">
		<div class="col-3">&nbsp;</div>
		
		<div class="col-6 area-2 setup">
			<form action="/setup/save" method="post" id="setup-form">

				{!! csrf_field(); !!}

				<label for="username"><h6>Username</h6></label>
				<input id="username" type="text" name="username" placeholder="Pick your username">

				<div class="col-12 area-2 error"></div>

				<label for="birthday"><h6>Birthday</h6></label>
				<input id="birthday" value="{{ date('Y-m-d', $user->birthday) }}" type="date" name="birthday">

				<label for="metric"><h6>System of measurement</h6></label>
				<select name="metric" id="metric">
					<option value="1">Metric</option>
					<option value="O">Imperial</option>
				</select>

				<label for="locale"><h6>Language</h6></label>
				<select name="locale" id="locale">
					<option value="en">English</option>
					<option value="cs">Česky</option>
				</select>

				<button>Save</button>
			</form>
		</div>	

		<div class="col-3">&nbsp;</div>
	</div>
	
@stop