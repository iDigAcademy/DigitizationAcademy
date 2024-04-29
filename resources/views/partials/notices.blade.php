@if ($notices !== null)
    <div class="alert alert-warning alert-dismissable text-center" style="margin-bottom: 0;">
        @foreach ($notices as $notice)
            <p><strong>{{ t('Warning') }}: </strong> {!! $notice->message !!}</p>
        @endforeach
    </div>
@endif