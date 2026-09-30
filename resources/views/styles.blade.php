@php
    $glowDark = config('liquid-glass.background_glow.dark', []);
    $glowLight = config('liquid-glass.background_glow.light', []);
    $header = config('liquid-glass.header', []);
    $modals = config('liquid-glass.modals', []);
    $slideOvers = config('liquid-glass.slide_overs', []);
    $dropdowns = config('liquid-glass.dropdowns', []);
    $fadedHeader = $header['faded_blur'] ?? true;
@endphp
<style id="filament-liquid-glass-variables">
:root {
    --lg-bg-canvas-light: {{ $glowLight['bg_canvas'] ?? '#f8fafc' }};
    --lg-glow-light-primary: {{ $glowLight['royal_blue'] ?? 'rgba(37, 99, 235, 0.12)' }};
    --lg-glow-light-secondary: {{ $glowLight['blue_purple'] ?? 'rgba(139, 92, 246, 0.09)' }};
    --lg-glow-light-ambient: {{ $glowLight['ambient'] ?? 'rgba(99, 102, 241, 0.04)' }};

    --lg-header-blur: {{ $header['blur_intensity'] ?? '28px' }};
    --lg-header-saturation: {{ $header['saturation'] ?? '180%' }};

    --lg-modal-blur: {{ $modals['blur'] ?? '28px' }};
    --lg-slideover-blur: {{ $slideOvers['blur'] ?? '32px' }};
    --lg-dropdown-blur: {{ $dropdowns['blur'] ?? '24px' }};
}

.dark {
    --lg-bg-canvas-dark: {{ $glowDark['bg_canvas'] ?? '#0b0f19' }};
    --lg-glow-dark-primary: {{ $glowDark['royal_blue'] ?? 'rgba(30, 64, 175, 0.32)' }};
    --lg-glow-dark-secondary: {{ $glowDark['blue_purple'] ?? 'rgba(109, 40, 217, 0.22)' }};
    --lg-glow-dark-ambient: {{ $glowDark['ambient'] ?? 'rgba(59, 130, 246, 0.08)' }};
}

@if(!$fadedHeader)
.fi-topbar::before {
    mask-image: none !important;
    -webkit-mask-image: none !important;
}
@endif
</style>
