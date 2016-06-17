@extends('layouts.admin')

@section('main')
	<div class="grid col-9">
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
        <div class="col-8 area-4">
        	<h3>TOP produkty:</h3>
            <ul style="width: 100%" class="hover">
            	@foreach ($top_products as $product)
                    <a href="/products/detail/{{ $product['item_id'] }}" target="_blank">
                        <li class="col-4 area-4 product">
                            <img src="{{ $product['img'] }}" class="thumbnail">
                            <div class="area-4">
                              <p class="left bold big"> Kliknutí: {{ $product['clicks'] }} </p>
                              <p class="left bold big"> Náhledů: {{ $product['views'] }} </p>
                            </div>
                        </li>
                    </a>
            	@endforeach
            </ul>
        </div>
        <div class="col-4 area-4">
            <p class="justify dark-grey-text">
                Celkové provize: <span class="bold">{{ $total['earned'] }} Kč</span>
            </p>
            <p class="justify dark-grey-text">
                Celkem kliknutí: <span class="bold">{{ $total['clicks'] }}</span>
                <span class="italic">({{ @round($total['earned'] / $total['clicks'], 2) }} Kč/klik)</span>
            </p>
            <p class="justify dark-grey-text">
                <a href="https://analytics.google.com/analytics/web/?hl=cs&pli=1#report/defaultid/a70806703w108083943p112611554/"
                target="ga" class="theme-bg">Google Analytics | Ebchod</a>
            </p>
        </div>
	</div>
@stop