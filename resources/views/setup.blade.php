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

				{!! csrf_field() !!}

				<label for="username"><h6>{{ trans('page.setup.username') }}</h6></label>
				<input class="setup" id="username" type="text" name="username" placeholder="{{ trans('page.setup.pick_username') }}">

				<div class="col-12 area-2 error length">
					 {{ trans('page.setup.username.long') }}
				</div>
				<div class="col-12 area-2 error taken">
					 {{ trans('page.setup.username.taken') }}
				</div>
				<div class="col-12 area-2 error check">
					 {{ trans('page.setup.username.err') }}					
				</div>

				<label for="birthday"><h6>{{ trans('page.settings.birthday') }}</h6></label>
				<div class="col-12 area-2 desc">
					{{ trans('page.setup.birthday.desc') }}
				</div>
				<input class="setup" id="birthday" value="{{ date('Y-m-d', $user->birthday) }}" type="date" name="birthday">

				<label for="metric"><h6>{{ trans('page.settings.measurement') }}</h6></label>
				<select class="setup" name="metric" id="metric">
					<option value="1">
						{{ trans('page.settings.measurement.metric') }}
					</option>
					<option {{ !$user->metric ? 'selected' : '' }} value="O">
						{{ trans('page.settings.measurement.imperial') }}
					</option>
				</select>

				<label for="locale"><h6>{{ trans('page.settings.language') }}</h6></label>
				<select class="setup" name="locale" id="locale">
					<option {{ Cookie::get('locale') == 'en' ? 'selected' : '' }} value="en">English</option>
					<option {{ Cookie::get('locale') == 'cs' ? 'selected' : '' }} value="cs">Česky</option>
				</select>

				<button class="setup">{{ trans('page.save') }}</button>
			</form>

			<h6>{{ trans('page.tags') }}</h6>
			<div class="col-12 area-2 desc">
				{{ trans('page.setup.tags.desc') }}
			</div>
			<table class="table-simple tags" style="border: 1px solid #e4e4e4;">
				@foreach($user->tags as $tag)
					<tr>
						<td class="bold">{{ $tag->name }}</td>
						<td>{{ $tag->unit }}</td>
						<td class="right">
							<i data-id="{{ $tag->id }}" class="fa fa-times verify delete" aria-hidden="true"></i>
						</td>
					</tr>
				@endforeach	
				<tr>
					<form method="post" id="new-tag">
						<td>
							<input name="name" placeholder="{{ trans('page.tags.enter_name') }}" type="text">
							<input name="user" value="{{ $user->id }}" type="hidden">
						</td>
						<td>
							<input name="unit" placeholder="{{ trans('page.tags.enter_unit') }}" type="text">
						</td>
						<td class="right">
							<button><i class="fa fa-plus" aria-hidden="true"></i></button>
						</td>
					</form>
				</tr>
			</table>	
		</div>	

		<div class="col-3">&nbsp;</div>
	</div>
	
@stop