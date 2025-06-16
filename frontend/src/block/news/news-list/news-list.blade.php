<div class="{{ $block->mod($mods ?? []) }}">

    @foreach ($newsList as $newsItem)
    {!! $renderer->renderBlock(
    'news/news-list-elem',
    [
    'date' => $newsItem->date,
    'name' => $newsItem->title,
    'text' => $newsItem->announce,
    'url' => '/news/'. $newsItem->id 
    ]
    ) !!}
    @endforeach

</div>