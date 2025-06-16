<article class="{{ $block->mod($mods ?? []) }}">
    {!! $renderer->renderBlock('common/date', ['date' => $date]) !!}
    <h3 class="{{ $block->elem('title') }}">{!! $name !!}</h3>
    <p class="{{ $block->elem('text') }}">{!! $text !!}</p>
    {!! $renderer->renderBlock('common/button', ['url'=>$url, 'text' => 'подробнее' ]) !!}
</article>