<div class="@if($class ?? false) {{ $class }}@endif"></div>

<footer class="{{ $block->mod($mods ?? []) }} container">
    <span class="{{ $block->elem('text') }}">{!! $text !!}</span>
</footer>