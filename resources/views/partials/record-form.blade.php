<div class="col-6 area-4 grid-item">
	<div class="record-form record">
		<form method="post" action="/profile/add" enctype="multipart/form-data">
			<input type="hidden" name="user" value="{{ $user->id }}" />
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

			<a href="/profile/tags"><p class="title">Custom Tags</p></a>

			<div class="pseudo-table">
				@foreach($user->tags as $tag)
					<p>{{ $tag->name }}</p>
					<p><input type="text" name="data[{{ $tag->name }}]" /></p>
				@endforeach
			</div>

			<p data-img="" class="title toggle-photo">photo (optional)</p>

			<div class="pseudo-table">
				<p>choose</p>
				<p><input type="file" name="img" /></p>
			</div>

			<button>ADD</button>
		</form>

		<div class="add almost-white-bg"><div></div></div>
	</div>
</div>