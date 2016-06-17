@extends('layouts.page')

@section('main')

	<div class="row light-grey-bg">
	
		@foreach($user->records as $record)
			@include('partials.record')
		@endforeach

		<div class="col-6 area-4 grid-item">
			<div class="record-form record">
				<form method="post" action="profile/add" enctype="multipart/form-data">
					{!! csrf_field() !!}
					<h4 class="theme-bg light-grey-text center area-2">New record</h4>

					<p class="title">basic info</p>

					<div class="pseudo-table">
						<p>height</p>
						<p><input type="text" name="height" /></p>
						<p>weight</p>
						<p><input type="text" name="weight" /></p>
					</div>

					<p class="title">energy</p>

					<div class="pseudo-table">
						<p>caloric intake</p>
						<p><input type="text" name="kcal" /></p>
						<p>exercise</p>
						<p>
							<select name="cal_level">
								<option value="1.2">None</option>
								<option value="1.375">1-3 times/week</option>
								<option value="1.55">3-5 times/week</option>
								<option value="1.725">6-7 times/week</option>
								<option value="1.9">Full time athlete</option>
							</select>

						</p>
					</div>

					<p class="title">measures</p>

					<div class="pseudo-table">
						<p>biceps</p>
						<p><input type="text" name="arm" /></p>
						<p>thighs</p>
						<p><input type="text" name="leg" /></p>
						<p>chest</p>
						<p><input type="text" name="chest" /></p>
						<p>waist</p>
						<p><input type="text" name="waist" /></p>
						<p>hips</p>
						<p><input type="text" name="hips" /></p>
						<p>calves</p>
						<p><input type="text" name="calf" /></p>
					</div>

					<p data-img="" class="title toggle-photo">photo (optional)</p>

					<div class="pseudo-table">
						<p>choose</p>
						<p><input type="file" name="img" /></p>
					</div>

					<button>ADD</button>
				</form>

				<div class="add light-grey-bg"><div></div></div>
			</div>
		</div>
	</div>
	
@stop