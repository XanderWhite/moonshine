<div class="{{ $block->mod($mods ?? []) }} swiper">
    <div class="{{ $block->elem('wrapper') }} swiper-wrapper">

        <div class="{{ $block->elem('news') }} swiper-slide" style="background: url('/storage/{!! $lastNews->image !!}') #333 no-repeat center / cover;">
            <div class="{{ $block->elem('news-inner') }}">
                <a class="{{ $block->elem('title') }}" href="/news/{!! $lastNews->id !!}">{!! $lastNews->title !!}</a>
                <div class="{{ $block->elem('text') }}">{!! $lastNews->announce  !!}</div>
            </div>
        </div>

    </div>

</div>