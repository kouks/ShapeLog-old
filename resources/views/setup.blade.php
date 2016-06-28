@extends('layouts.empty')

@section('main')

	<div class="row almost-white-bg">
		<div class="col-12 area-2">
			<h1 class="center">{{ trans('page.setup.heading') }}</h1>			
		</div>
	</div>
	<div class="row white-bg">
		<div class="col-12 area-2">
			<p class="center big grey-text serif">{{ trans('page.setup.desc') }}</p>
		</div>
	</div>

	<div class="row almost-white-bg">
		<div class="col-3">&nbsp;</div>
		
		<div class="col-6 area-2 setup">
			<form action="/setup/save" method="post" id="setup-form">

				{!! csrf_field(); !!}

				<label for="username"><h6>{{ trans('page.setup.username') }}</h6></label>
				<input id="username" type="text" name="username" placeholder="{{ trans('page.setup.pick_username') }}">

				<div class="col-12 area-2 error length">
					Your username has to be 4 - 20 characters long and has to contain only numbers and English letters.
				</div>
				<div class="col-12 area-2 error taken">
					This username is alread taken
				</div>
				<div class="col-12 area-2 error check">
					Please, check the viability of your username
				</div>

				<label for="birthday"><h6>{{ trans('page.settings.birthday') }}</h6></label>
				<input id="birthday" value="{{ date('Y-m-d', $user->birthday) }}" type="date" name="birthday">

				<label for="metric"><h6>{{ trans('page.settings.measurement') }}</h6></label>
				<select name="metric" id="metric">
					<option value="1">
						{{ trans('page.settings.measurement.metric') }}
					</option>
					<option {{ !$user->metric ? 'selected' : '' }} value="O">
						{{ trans('page.settings.measurement.imperial') }}
					</option>
				</select>

				<label for="locale"><h6>{{ trans('page.settings.language') }}</h6></label>
				<select name="locale" id="locale">
					<option {{ Cookie::get('locale') == 'en' ? 'selected' : '' }} value="en">English</option>
					<option {{ Cookie::get('locale') == 'cs' ? 'selected' : '' }} value="cs">Česky</option>
				</select>

				<button>Save</button>
			</form>
		</div>	

		<div class="col-3">&nbsp;</div>
	</div>
	
@stop