<div {{ $attributes->merge(['class' => 'process-work'])->merge(['data-sal' => 'slide-right']) }} data-sal-duration="1000" data-sal-delay="100">
    <div class="thumbnail paralax-image">
        <img src="{{ $team->present()->team_image }}" alt="Thumbnail">
    </div>
    <div class="content">
        <h2 class="title text-light mb-1">{{ $team->name }}</h2>
        <span class="subtitle">{{ $team->title }}</span>
        <ul class="social-share list-unstyled d-flex mb-3">
            <li><a href="mailto:{{ $team->email }}"><i class="fa fa-envelope"></i></a></li>
            @isset($team->twitter_handle)
                <li><a href="//twitter.com/{{ $team->twitter_handle }}"><i class="fab fa-twitter"></i></a></li>
            @endisset
        </ul>
        <p>{{ $team->about }}</p>
    </div>
</div>
