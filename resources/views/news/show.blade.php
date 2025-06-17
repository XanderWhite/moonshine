@extends('layouts.app')

@section('content')
<div class="crumbs container">
    <a class="crumbs__item crumbs__item_link" href="/">Главная</a>
    <span class="crumbs__item">/</span>
    <span class="crumbs__item active">{!! $news->title !!}</span>
</div>

<section class="news-detail-section container">
    <?
    echo app('tao.frontend')->templates()->renderBlock(
        'news-detail/news-detail-header',
        [
            'title' =>  $news->title,
            'id' =>  $news->id,
        ]
    );

    echo app('tao.frontend')->templates()->renderBlock(
        'news-detail/news-detail-content',
        [
            'date' => $news->formatted_date,
            'title' =>$news->announce,
            'text' => $news->content,
            'themes' => $news->tags,

            'picSrc' => storage_path($news->image), // asset('storage/' . $news->image),
            'picAlt' => $news->title
        ]
    );
    ?>
</section>
@endsection