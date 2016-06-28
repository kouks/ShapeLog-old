
<div class="page-shadow">
	<div class="record-form record">
		<form method="post" action="/profile/add" enctype="multipart/form-data">
			<input type="hidden" name="user" value="{{ $user->id }}" />
			{!! csrf_field() !!}

			<h4 class="theme-bg light-grey-text center area-2">{{ trans('page.records.new') }}</h4>

			<p class="title">{{ trans('page.records.basic') }}</p>

			<p class="row">
				<span>{{ trans('page.height') }}</span>
				<span><input type="text" name="height" /></span>
			</p>
			<p class="row">
				<span>{{ trans('page.weight') }}</span>
				<span><input type="text" name="weight" /></span>
			</p>

			<p class="title">{{ trans('page.records.energy') }}</p>

			<p class="row">
				<span>{{ trans('page.records.intake') }}</span>
				<span><input type="text" name="kcal" /></span>
			</p>
			<p class="row">
				<span>{{ trans('page.records.exercise') }}</span>
				<span>
					<select name="cal_level">
						<option value="1.2">{{ trans('page.none') }}</option>
						<option value="1.375">{{ trans('page.records.exercise.1-3') }}</option>
						<option value="1.55">{{ trans('page.records.exercise.4-5') }}</option>
						<option value="1.725">{{ trans('page.records.exercise.6-7') }}</option>
						<option value="1.9">{{ trans('page.records.exercise.full_time') }}</option>
					</select>
				</span>
			</p>

			<a href="/profile/tags"><p class="title">{{ trans('page.tags') }}</p></a>

			<div class="pseudo-table">
				@foreach($user->tags as $tag)
					<p class="row">
						<span>{{ $tag->name }}</span>
						<span><input type="text" name="data[{{ $tag->name }}]" /></span>
					</p>
				@endforeach
			</div>

			<p data-img="" class="title toggle-photo">
				{{ trans('page.photo') }} ({{ trans_choice('page.optional', 1) }})
			</p>

			<p class="row">
				<span>{{ trans('page.choose') }}</span>
				<span><input type="file" name="img" /></span>
			</p>

			<button>{{ trans('page.add') }}</button>
		</form>

		<i class="fa fa-times close" aria-hidden="true"></i>
	</div>
</div>