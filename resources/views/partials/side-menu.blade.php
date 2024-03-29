<div class="col-1 menu theme-bg">
	<div class="row">
	    <img class="profile-pic" src="//graph.facebook.com/{{ $user->fbid }}/picture?width=200&height=200">
	    <h5 class="center light-grey-text">{{ $user->first_name }}</h5>
	</div>

	<div class="row">
	    <nav>
	        <a title="{{ trans('page.feed') }}" href="/profile/feed">
	        	<i class="fa fa-globe" aria-hidden="true"></i>
	        </a>
	        <a title="{{ trans('page.records') }}" href="/profile/records">
	        	<i class="fa fa-th-large" aria-hidden="true"></i>
	        </a>
	        <a title="{{ trans('page.graphs') }}" href="/profile/graphs">
	        	<i class="fa fa-area-chart" aria-hidden="true"></i>
	        </a>
	        <a title="{{ trans('page.tags') }}" href="/profile/tags">
	        	<i class="fa fa-tags" aria-hidden="true"></i>
	        </a>
	        <a title="{{ trans('page.community') }}" href="/community">
	        	<i class="fa fa-users" aria-hidden="true"></i>
	        </a>
	        <a title="{{ trans('page.settings') }}" href="/profile/settings">
	        	<i class="fa fa-cog" aria-hidden="true"></i>
	        </a>
	        <a title="{{ trans('page.logout') }}" href="/logout">
	        	<i class="fa fa-sign-out" aria-hidden="true"></i>
	        </a>
	        <a class="secondary" style="display: none" title="{{ trans('page.bug') }}">
	        	<i class="fa fa-bug" aria-hidden="true"></i>
	        </a>
	    </nav>
	</div>

	<div class="row logo">
	    <a href="/"><img src="/img/logo-white-300.png"></a>
	</div>
</div>