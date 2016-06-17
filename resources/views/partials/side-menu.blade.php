<div class="col-2 menu theme-bg">
	<div class="row">
	    <img src="//graph.facebook.com/{{ $user->fbid }}/picture?type=large">
	    <h4 class="center light-grey-text">{{ $user->first_name }}</h4>
	</div>

	<div class="row">
	    <ul>
	        <a href="/profile/"><li>Home</li></a>
	        <a href=""><li>Graphs</li></a>
	        <a href=""><li>Settings</li></a>
	        <a href="/profile/logout"><li>Logout</li></a>
	    </ul>
	</div>
</div>