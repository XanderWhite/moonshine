<div class="{{ $block->mod($mods ?? []) }}">
    <div class="{{ $block->elem('block') }}">
        {!! $renderer->renderBlock('common/date', ['date' => $date]) !!}

        <div class="{{ $block->elem('title') }}">
            {!! $title !!}
        </div>
        <div class="{{ $block->elem('text') }}">{!! $text !!}</div>
        {!! $renderer->renderBlock('common/button', ['url'=>'/news', 'text' => 'назад к новостям', 'mods' => ['reverse'], 'modsSvg' => ['reverse','left'] ]) !!}

        @if (!empty($themes))
        <div class="{{ $block->elem('themes') }}">
            <b class="{{ $block->elem('themes-title') }}">Темы:</b>
            @php
            $thms = [];

            foreach ($themes as $theme) {
            $thms[] = '<a href="' . $theme['URL'] . '" class="' . $block->elem('themes-link') . '">' . $theme['NAME'] . '</a>';
            }

            echo implode(', ', $thms);
            @endphp
        </div>
        @endif
    </div>

    @if (!empty($picSrc))
    <div class="{{ $block->elem('block') }}">
        <img class="{{ $block->elem('image') }}"
            src="{!! $picSrc !!}"
            alt="{!! $picAlt !!}">
    </div>
    @endif
</div>