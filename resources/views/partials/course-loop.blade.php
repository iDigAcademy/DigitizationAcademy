<aside class="col-md-6 col-sm-12 project {{ date_compare($course->end_date) ? 'future' : 'past' }}">
    @include('partials.course')
</aside>
