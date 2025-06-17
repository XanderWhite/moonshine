@extends('layouts.app')

@section('content')
<?
echo app('tao.frontend')->templates()->renderBlock(
    'news/news-lastnews',
    ['newslist' => $lastNews]
); ?>

<section class="news-section container">
    <?
    $title = 'Новости';

    if ($currentTag)
        $title .= ' по теме: ' . $currentTag->name;

    echo app('tao.frontend')->templates()->renderBlock(
        'common/title',
        [
            'title' => $title,
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