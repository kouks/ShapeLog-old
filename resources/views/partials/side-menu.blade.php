<div class="col-1 menu theme-bg">
	<div class="row">
	    <img class="profile-pic" src="//graph.facebook.com/{{ $user->fbid }}/picture?width=200&height=200">
	    <h5 class="center light-grey-text">{{ $user->first_name }}</h5>
	</div>

	<div class="row">
	    <nav>
	        <a title="{{ trans('page.home') }}" href="/profile/">
	        	<i class="fa fa-home" aria-hidden="true"></i>
	        </a>
	        <a title="{{ trans('page.graphs') }}" href="/profile/graphs">
	        	<i class="fa fa-area-chart" aria-hidden="true"></i>
	        </a>
	        <a title="{{ trans('page.tags') }}" href="/profile/tags">
	        	<i class="fa fa-tags" aria-hidden="true"></i>
	        </a>
	        <a title="{{ trans('page.community') }}" href="/profile/community">
	        	<i class="fa fa-users" aria-hidden="true"></i>
	        </a>
	        <a title="{{ trans('page.settings') }}" href="/profile/settings">
	        	<i class="fa fa-cog" aria-hidden="true"></i>
	        </a>
	        <a title="{{ trans('page.logout') }}" href="/profile/logout">
	        	<i class="fa fa-sign-out" aria-hidden="true"></i>
	        </a>
	    </nav>
	</div>

	<div class="row logo">
	    <a href="/"><img src="/img/logo-white-300.png"></a>
	</div>
</div>