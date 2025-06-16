<div class="{{ $block->mod($mods ?? []) }}">
    <h3 class="{{ $block->elem('subtitle') }}">Новость #{!! $id !!}:</h3>
    {!! $renderer->renderBlock('common/title', ['title' => $title]) !!}
</div>