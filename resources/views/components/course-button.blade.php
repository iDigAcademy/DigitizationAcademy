<li class="nav-item" role="presentation">
    <button {{ $attributes->merge([
            'class' => 'nav-link digi-btn btn-fill-primary secondary',
            'type' => 'button',
            'role' => 'tab',
            'data-bs-toggle' => 'pill',
            'aria-selected' => 'false'
            ]) }}
            id="{{ $value }}-tab"
            data-bs-target="#{{ $value }}"
            aria-controls="{{ $value }}"
            aria-selected="true">{{ ucwords(str_replace('-', ' ', $value)) }}
    </button>
</li>
