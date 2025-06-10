<?php

namespace App\Http\Controllers;

use App\Models\News;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    public function index(Request $request, $page = null)
    {
        $currentPage = $page ?? $request->get('page', 1);
        $perPage = 4;

         $news = News::OrderedNews()
            ->paginate($perPage, ['*'], 'page', $currentPage);

        return view('news.index', [
            'news' => $news,
            'lastNews' =>News::OrderedNews()->first()
        ]);
    }

    public function show($id)
    {
        $news = News::findOrFail($id);
        return view('news.show', ['news' => $news]);
    }
}
