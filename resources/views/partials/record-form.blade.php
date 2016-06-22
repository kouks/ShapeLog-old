<div class="col-6 area-4 grid-item">
	<div class="record-form record">
		<form method="post" action="/profile/add" enctype="multipart/form-data">
			<input type="hidden" name="user" value="{{ $user->id }}" />
			{!! csrf_field() !!}

			<h4 class="theme-bg light-grey-text center area-2">New record</h4>

			<p class="title">basic info</p>

			<p class="row">
				<span>height</span>
				<span><input type="text" name="height" /></span>
			</p>
			<p class="row">
				<span>weight</span>
				<span><input type="text" name="weight" /></span>
			</p>

			<p class="title">energy</p>

			<p class="row">
				<span>calorie intake</span>
				<span><input type="text" name="kcal" /></span>
			</p>
			<p class="row">
				<span>exercise</span>
				<span>
					<select name="cal_level">
						<option value="1.2">None</option>
						<option value="1.375">1-3 times/week</option>
						<option value="1.55">3-5 times/week</option>
						<option value="1.725">6-7 times/week</option>
						<option value="1.9">Full time athlete</option>
					</select>
				</span>
			</p>

			<a href="/profile/tags"><p class="title">Custom Tags</p></a>

			<div class="pseudo-table">
				@foreach($user->tags as $tag)
					<p class="row">
						<span>{{ $tag->name }}</span>
						<span><input type="text" name="data[{{ $tag->name }}]" /></span>
					</p>
				@endforeach
			</div>

			<p data-img="" class="title toggle-photo">photo (optional)</p>

			<p class="row">
				<span>choose</span>
				<span><input type="file" name="img" /></span>
			</p>

			<button>ADD</button>
		</form>

		<div class="add almost-white-bg"><div></div></div>
	</div>
</div>