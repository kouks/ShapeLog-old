@extends('layouts.master')

@section('main') 

    @if(!isset($_SESSION["facebook_access_token"]))
        <div class="row">
            <div class="col-12 center area-4">
                <h3>Our app requires you to login with Facebook</h3>
            </div>

            <div class="col-12 center area-4">
                <a class="fb-button center" href="{{ $loginUrl }}">
                    <i class="fa fa-2 fa-facebook"></i> &nbsp;&nbsp;
                    Login with Facebook
                </a>
            </div>
        </div>
    @endif

    <div class="row almost-white-bg">
        <div class="col-3">&nbsp;</div>
        <div class="col-3 area-4 right">
            <p class="right">
                <img src="http://placehold.it/150x150">
            </p>
        </div>
        <div class="col-4 area-4 left">
            <p class="left big">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sequi assumenda quibusdam sapiente, iste dolore necessitatibus saepe quae odit nam esse libero eum autem impedit temporibus! Hic nihil nesciunt ullam maxime fugit dignissimos adipisci aut ut ipsam vitae dolorem, unde labore eaque quia, dolores aliquid consequatur modi odit exercitationem delectus ratione.</p>
        </div>
        <div class="col-2">&nbsp;</div>
    </div>

    <div class="row">
        <div class="col-2">&nbsp;</div>
        <div class="col-4 area-4 right">
            <p class="right big">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sequi assumenda quibusdam sapiente, iste dolore necessitatibus saepe quae odit nam esse libero eum autem impedit temporibus! Hic nihil nesciunt ullam maxime fugit dignissimos adipisci aut ut ipsam vitae dolorem, unde labore eaque quia, dolores aliquid consequatur modi odit exercitationem delectus ratione.</p>
        </div>
        <div class="col-3 area-4 left">
            <p class="left">
                <img src="http://placehold.it/150x150">
            </p>
        </div>
        <div class="col-3">&nbsp;</div>
    </div>

    <div class="row almost-white-bg">
        <div class="col-3">&nbsp;</div>
        <div class="col-3 area-4 right">
            <p class="right">
                <img src="http://placehold.it/150x150">
            </p>
        </div>
        <div class="col-4 area-4 left">
            <p class="left big">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sequi assumenda quibusdam sapiente, iste dolore necessitatibus saepe quae odit nam esse libero eum autem impedit temporibus! Hic nihil nesciunt ullam maxime fugit dignissimos adipisci aut ut ipsam vitae dolorem, unde labore eaque quia, dolores aliquid consequatur modi odit exercitationem delectus ratione.</p>
        </div>
        <div class="col-2">&nbsp;</div>
    </div>

@stop
