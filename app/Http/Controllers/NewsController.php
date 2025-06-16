<?php

namespace App\Http\Controllers;

use App\Models\News;
use App\Models\Tag;
use Illuminate\Http\Request;

class NewsController
{
    public function index(Request $request, $url = null)
    {
        $perPage = 2;

        $query = News::with('tags')->orderedNews();

        if ($url) {
            $tag = Tag::where('slug', $url)->firstOrFail();
            $query->whereHas('tags', function ($q) use ($tag) {
                $q->where('tags.id', $tag->id);
            });
        }
        $lastNews = $query->first();
        $news = $query->paginate($perPage);

        return view('news.index', [
            'news' => $news,
            'lastNews' => $lastNews,
            'currentTag' => $url ? $tag : null
        ]);
    }

    public function show($id)
    {
        $news = News::with('tags')->findOrFail($id);
        return view('news.show', ['news' => $news]);
    }
}
