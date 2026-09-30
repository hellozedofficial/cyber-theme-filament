@php
    $glowEnabled = config('liquid-glass.background_glow.enabled', true);
@endphp

@if($glowEnabled)
<div class="fi-liquid-glass-glow-ambient" aria-hidden="true">
    <div class="fi-lg-glow-orb fi-lg-glow-royal-blue"></div>
    <div class="fi-lg-glow-orb fi-lg-glow-purple"></div>
    <div class="fi-lg-glow-orb fi-lg-glow-center"></div>
</div>
@endif
