<div class="col-1 menu theme-bg">
	<div class="row">
	    <img class="profile-pic" src="//graph.facebook.com/{{ $user->fbid }}/picture?width=200&height=200">
	    <h5 class="center light-grey-text">{{ $user->first_name }}</h5>
	</div>

	<div class="row">
	    <nav>
	        <a title="Home" href="/profile/"><i class="fa fa-home" aria-hidden="true"></i></a>
	        <a title="Graphs" href="/profile/graphs"><i class="fa fa-area-chart" aria-hidden="true"></i></a>
	        <a title="Custom tags" href="/profile/tags"><i class="fa fa-tags" aria-hidden="true"></i></a>
	        <a title="Community" href="/profile/community"><i class="fa fa-users" aria-hidden="true"></i></a>
	        <a title="Settings" href="/profile/settings"><i class="fa fa-cog" aria-hidden="true"></i></a>
	        <a title="Logout" href="/profile/logout"><i class="fa fa-sign-out" aria-hidden="true"></i></a>
	    </nav>
	</div>

	<div class="row logo">
	    <a href="/"><img src="/img/graph.png"></a>
	</div>
</div>

