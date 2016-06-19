@extends('layouts.page')

@section('main')

	<div class="row almost-white-bg">
		<div class="col-12 area-2">
			<h1 class="center">Edit custom tags</h1>			
		</div>
	</div>

	<div class="row white-bg">
		<div class="col-12 area-2">
			<table class="table-simple tags">
				@foreach($user->tags as $tag)
					<tr>
						<td class="bold">{{ $tag->name }}</td>
						<td>{{ $tag->unit }}</td>
						<td class="center verify delete">
							<a href="/profile/tags/delete/{{ $tag->id }}"><i class="fa fa-times" aria-hidden="pue"></i></a>
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
						<td>
							<button>Add</button>
						</td>
					</form>
				</tr>
			</table>	
		</div>
	</div>
	
@stop