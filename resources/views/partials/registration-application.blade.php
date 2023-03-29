@if($course->url_type === 0)
    @if(isset($course->registration_url))
        <a href="{{ $course->registration_url }}" target="_blank" class="btn btn-primary">{{ t('Register') }}</a>
    @else
        {{ t('Registration will open about 8 weeks prior to the offering.') }}
    @endif
@else
    @if(isset($course->registration_url))
        <a href="{{ $course->registration_url }}" target="_blank" class="btn btn-primary">{{ t('Apply') }}</a>
    @else
        {{ t('Application will open about 8 weeks prior to the offering.') }}
    @endif
@endif
