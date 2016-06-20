<div class="col-2 menu theme-bg">
	<div class="row">
	    <img src="//graph.facebook.com/{{ $user->fbid }}/picture?width=200&height=200">
	    <h4 class="center light-grey-text">{{ $user->first_name }}</h4>
	</div>

	<div class="row">
	    <nav>
	        <a href="/profile/"><i class="fa fa-home" aria-hidden="true"></i> Home</a>
	        <a href="/profile/graphs"><i class="fa fa-area-chart" aria-hidden="true"></i> Graphs</a>
	        <a href="/profile/tags"><i class="fa fa-tags" aria-hidden="true"></i> Custom Tags</a>
	        <a href="/profile/settings"><i class="fa fa-cog" aria-hidden="true"></i> Settings</a>
	        <a href="/profile/logout"><i class="fa fa-sign-out" aria-hidden="true"></i> Logout</a>
	    </nav>
	</div>
</div>