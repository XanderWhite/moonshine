@extends('layouts.app')

@section('content')
<!-- @if($lastNews)
<div class="last-news" style="background: url('/storage/{!! $lastNews->image !!}') no-repeat center / cover;">
    <div class="last-news__inner container">
        <a class="last-news__title-link" href="/news/{!! $lastNews->id !!}">
            <h2 class="last-news__title">{!! $lastNews->title !!}</h2>
        </a>
        <div class="last-news__text">{!! $lastNews->announce !!}</div>
    </div>
</div>
@endif

<section class="news-section container">
    <h2 class="news-section__title">Новости
        @if($currentTag)
        <span> по теме: {{ $currentTag->name }}</span>
        @endif
    </h2>

    <div class="news-list">
        @foreach ($news as $item)
        <article class="news-item">
            <time datetime="{!! $item->date !!}" class="news-date">{!! $item->formatted_date !!}</time>
            <h3 class="news-title">{!! $item->title !!}</h3>
            <div class="news-text">{!! $item->announce !!}</div>
            <a class="news-link" href="/news/{!! $item->id !!}">
                <span class="news-link__text">подробнее</span>
                <svg class="news-link__svg" viewBox="0 0 27.004 13.322">
                    <path d="M1.02 7.64 1 7.66c-.56 0-1-.44-1-1s.44-1 1-1l.02.02v1.96Zm23.56-.98-4.95-4.95a.99.99 0 0 1 0-1.42c.4-.39 1.02-.39 1.42 0l5.65 5.66c.4.39.4 1.02 0 1.41l-5.65 5.66c-.4.4-1.02.4-1.42 0-.4-.4-.4-1.02 0-1.41l4.95-4.95Z" />
                    <path d="m23.58 5.66-3.95-3.95a.99.99 0 0 1 0-1.42c.4-.39 1.02-.39 1.42 0l5.65 5.66c.4.39.4 1.02 0 1.41l-5.65 5.66c-.4.4-1.02.4-1.42 0-.4-.4-.4-1.02 0-1.41l3.95-3.95H1c-.56 0-1-.44-1-1s.44-1 1-1h22.58Z" />
                </svg>
            </a>
        </article>
        @endforeach
    </div> -->

<?
echo app('tao.frontend')->templates()->renderBlock(
    'news/news-lastnews',
    ['lastNews' => $lastNews]
); ?>

<section class="news-section container">
    <?
    echo app('tao.frontend')->templates()->renderBlock(
        'common/title',
        [
            'title' => 'Новости',
        ]
    );

    echo app('tao.frontend')->templates()->renderBlock(
        'news/news-list',
        [
            'newsList' => $news,
        ]
    );
    ?>

    <div class="pagination">
        {!! $news->links('pagination.arrows') !!}
    </div>


</section>


@endsection