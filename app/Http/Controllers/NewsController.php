<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\News;

class NewsController extends Controller
{
    public function index(Request $request)
    {
        $posts = News::all()->sortByDesc('updated_at');
        //News::all()・・・Eloquentを使ったすべてのnewsテーブルを取得
        //・・・sortByDesc降順。sortByが昇順

        if (count($posts) > 0){
            $headline = $posts->shift();
            //shift()メソッド＝配列の最初のデータを削除し、削除した値を返す。配列は左にシフトする。
            //つまり、$headlineに、最新の記事の情報を代入。$postには、最新の記事をのぞいた記事を保持

        } else {
            $headline = null;
        }

        //news/index.blade.php　ファイルを渡している
        // viewテンプレートに headline,posts という変数を渡している
        return view('news.index', ['headline' => $headline,'posts' => $posts]);

    }

}
