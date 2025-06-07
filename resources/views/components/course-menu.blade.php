<ul class="digi-submenu">
    <li><a href="{{ route('catalog.index') }}">Course Catalog</a></li>
    @foreach($courses as $course)
        <li>
            <a href="{{ route('course.index', ['slug' => $course->slug]) }}">{{ $course->title }}</a>
        </li>
    @endforeach
</ul>