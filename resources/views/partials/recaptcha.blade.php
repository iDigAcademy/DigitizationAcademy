<div class="form-group mt-4">
    @if ($errors->has('g-recaptcha-response'))
        <span class="help-block color-action">
        <strong>{{ $errors->first('g-recaptcha-response') }}</strong>
        </span>
    @endif
</div>
@push('scripts')
    <script src="https://www.google.com/recaptcha/api.js?render={{ config('services.recaptcha.site_key') }}"></script>

    <script type="text/javascript">
        $(function () {
            $('.recaptcha').on('submit', function (event) {
                event.preventDefault();
                grecaptcha.ready(function () {
                    grecaptcha.execute("{{ config('services.recaptcha.site_key') }}", {action: 'submit'}).then(function (token) {
                        $('.recaptcha').append('<input type="hidden" name="g-recaptcha-response" value="' + token + '">');
                        $('.recaptcha').unbind('submit').submit();
                    });
                });
            });
        });
    </script>
@endpush