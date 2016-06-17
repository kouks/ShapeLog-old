@extends('layouts.admin')

@section('main')
	<div class="col-12 area-4">
	    <table class="col-12 table-styled">
	        <tr> <th> Obchod <th> Kliknutí <th> Provize (v Kč)
	        @foreach ($shops as $shop)
	            <tr>    
	                <td> {{ $shop['name'] }}
	                <td> {{ $shop['clicks'] / $total['clicks'] * 100 }} % ({{$shop['clicks']}})
	                <td> {{ $shop['earned'] }}
	            </tr>
	        @endforeach
	    </table>
	</div>
@stop