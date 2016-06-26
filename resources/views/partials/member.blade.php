<a href="/profile/community/detail/{{ $member->id }}">
    <div class="member">
        <img class="profile-pic" src="//graph.facebook.com/{{ $member->fbid }}/picture?width=300&height=300">
        <span>{{ $member->first_name }} {{ $member->last_name }}</span>
    </div>
</a>