@extends('layouts.master')

@section('main') 


    <div class="row almost-white-bg">
        <div class="col-3">&nbsp;</div>
        <div class="col-3 area-4 right">
            <p class="right">
                <img src="img/logo-red-300.png">
            </p>
        </div>
        <div class="col-4 area-4 left">
            <h5 class="margin">{{ trans('master.about') }}</h5>
            <p class="justify big serif">{{ trans('master.about_text') }}</p>
        </div>
        <div class="col-2">&nbsp;</div>
    </div>

    <div class="row">
        <div class="col-2">&nbsp;</div>
        <div class="col-4 area-4 right">
            <h5 class="margin">{{ trans('master.features') }}</h5>
            <p class="justify big serif">{{ trans('master.features_text') }}</p>
        </div>
        <div class="col-3 area-4 left">
            <p class="left">
                <img src="img/graph.png">
            </p>
        </div>
        <div class="col-3">&nbsp;</div>
    </div>

    <div class="row almost-white-bg">
        <div class="col-3">&nbsp;</div>
        <div class="col-3 area-4 right">
            <p class="right">
                <img src="img/seal.png">
            </p>
        </div>
        <div class="col-4 area-4 left">
            <h5 class="margin">{{ trans('master.motivation') }}</h5>
            <p class="justify big serif">{{ trans('master.motivation_text') }}</p>
        </div>
        <div class="col-2">&nbsp;</div>
    </div>

@stop
