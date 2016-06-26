@extends('layouts.page')

@section('main')

	<div class="row almost-white-bg">
		<div class="col-12 area-2">
			<h1 class="center">Edit custom tags</h1>			
		</div>
	</div>
	<div class="row white-bg">
		<div class="col-12 area-2">
			<p class="center big grey-text">On this page, you can edit your own custom tags. Simply enter the name and unit of whatever you want to keep track of. It is automatically added to both your record form and graphs page.</p>
		</div>
	</div>

	<div class="row almost-white-bg">
		<div class="col-12 area-2">
			<table class="table-simple tags">
				@foreach($user->tags as $tag)
					<tr>
						<td class="bold">{{ $tag->name }}</td>
						<td>{{ $tag->unit }}</td>
						<td class="center verify delete">
							<a href="/profile/tags/delete/{{ $tag->id }}"><i class="fa fa-times" aria-hidden="true"></i></a>
						</td>
					</tr>
				@endforeach	
				<tr>
					<form method="post" id="new-tag">
						<td>
							<input name="name" placeholder="Enter a new tag" type="text">
							<input name="user" value="{{ $user->id }}" type="hidden">
							{!! csrf_field() !!}
						</td>
						<td>
							<input name="unit" placeholder="Enter unit" type="text">
						</td>
						<td class="center">
							<button><i class="fa fa-plus" aria-hidden="true"></i></button>
						</td>
					</form>
				</tr>
			</table>	
		</div>
	</div>
	
@stop