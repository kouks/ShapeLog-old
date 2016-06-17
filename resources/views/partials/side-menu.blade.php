<div class="col-2 menu theme-bg">
	<div class="row">
	    <img src="//graph.facebook.com/{{ $user->fbid }}/picture?width=200&height=200">
	    <h4 class="center light-grey-text">{{ $user->first_name }}</h4>
	</div>

	<div class="row">
	    <ul>
	        <a href="/profile/"><li><i class="fa fa-home" aria-hidden="true"></i> Home</li></a>
	        <a href="/profile/graphs"><li><i class="fa fa-area-chart" aria-hidden="true"></i> Graphs</li></a>
	        <a href="/profile/settings"><li><i class="fa fa-cog" aria-hidden="true"></i> Settings</li></a>
	        <a href="/profile/logout"><li><i class="fa fa-sign-out" aria-hidden="true"></i> Logout</li></a>
	    </ul>
	</div>
</div>