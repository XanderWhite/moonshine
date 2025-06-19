{{-- @for ($i = 0; $i < 10; $i++)
    <dl>
        <dt>Name</dt>
        <dd>{{ fake()->name() }}</dd>

        <dt>Email</dt>
        <dd>{{ fake()->unique()->safeEmail() }}</dd>
    </dl>
@endfor --}}

<div class="{{ $block->mod($mods ?? []) }} swiper">
    <div class="{{ $block->elem('wrapper') }} swiper-wrapper">

        @foreach ($newslist as $news)
            <div class="{{ $block->elem('news') }} swiper-slide"
                style="background: url('/storage/{!! $news->image !!}') #333 no-repeat center / cover;">
                <div class="{{ $block->elem('news-inner') }} container">
                    <a class="{{ $block->elem('title') }}" href='{!! route('news.show', $news->id) !!}'>{!! $news->title !!}</a>
                    <div class="{{ $block->elem('text') }}">{!! $news->announce !!}</div>
                </div>
            </div>
        @endforeach

    </div>

</div>
