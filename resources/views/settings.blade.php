@extends('layouts.page')

@section('main')

	<div class="row almost-white-bg">
		<div class="col-12 area-2">
			<h1 class="center">{{ trans('page.settings.heading') }}</h1>			
		</div>
	</div>
	<div class="row white-bg">
		<div class="col-12 area-2">
			<p class="center big grey-text serif">{{ trans('page.settings.desc') }}</p>
		</div>
	</div>
	
	<div class="row almost-white-bg settings">
		<div class="col-6 area-2">
		    <img class="profile-pic" src="//graph.facebook.com/{{ $user->fbid }}/picture?width=500&height=500">
		    <h4 class="center dark-grey-text">{{ $user->first_name }} {{ $user->last_name }}</h4>
		    <h6 class="center grey-text">{{ '@' . $user->username }}</h6>

		</div>
		
		<div class="col-5 area-2">
			<form action="/profile/settings/save" method="post">

				{!! csrf_field(); !!}

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
					<option {{ $user->locale == 'en' ? 'selected' : '' }} value="en">English</option>
					<option {{ $user->locale == 'cs' ? 'selected' : '' }} value="cs">Česky</option>
				</select>

				<button>Save</button>
			</form>
		</div>	
		
		<div class="col-1">&nbsp;</div>
	</div>
@stop