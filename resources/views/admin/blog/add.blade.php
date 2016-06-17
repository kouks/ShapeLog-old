@extends('layouts.admin')

@section('main')
	<script src="//cdn.ckeditor.com/4.5.5/standard/ckeditor.js"></script>

	<h4 class="margin">Nový příspěvek na blog</h4>

	<form class="admin-form blog" action="" method="post" enctype="multipart/form-data">
		{!! csrf_field() !!}
		<input type="hidden" name="sections_ids" id="sections" value>
		<input type="text" name="title" placeholder="Titulek článku" class="expanded">
		<input type="file" name="img">
		
		<span class="add-section btn"><i class="fa fa-plus"></i> Propojit s kategorií</span>
		<ul class="sections"></ul>
		<ul class="sections-list">
		    <?= Helper::sectionList($sections->get()) ?>
		</ul>

		<div>
			<textarea name="blog">
				
			</textarea>
			<script>
	            CKEDITOR.replace('blog');
	        </script>
		</div>
		<br />
		<button class="btn" type="submit">Přidat článek</button>
	</form>
@stop