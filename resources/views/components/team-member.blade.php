<div {{ $attributes->merge(['class' => 'team-page']) }} >
    <div>
        <img class="thumbnail" src="{{ $team->present()->teamImage() }}" alt="Thumbnail">
    </div>
    <div class="content">
        <h3 class="mb-2">
            <a href="mailto:amast@fsu.ed">
                {{ $team->name }} <i class="fa fa-envelope"></i>
            </a>
        </h3>
        <p class="subtitle">{{ $team->title }}</p>
        <p>{{ $team->about }}</p>
    </div>
</div>
