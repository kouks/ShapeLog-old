<a href="/profile/community/detail/{{ $member->username }}">
    <div class="member">
        <img class="profile-pic" src="//graph.facebook.com/{{ $member->fbid }}/picture?width=300&height=300">    
        <p>{{ $member->first_name }} {{ $member->last_name }}</p>
        <p>{{ '@' . $member->username }}</p>
    </div>
</a>