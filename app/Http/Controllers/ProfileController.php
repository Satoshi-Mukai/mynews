<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Profile;

class ProfileController extends Controller
{

    public function index(Request $request)
    {
        $posts = Profile::all()->sortByDesc('updated_at');//プロフィールが複数回更新されている場合、update日でソート
        if (count($posts) > 0){
            $lastEdited = $posts[0]; //プロフィール記事がある場合、最新の編集履歴の情報＝配列の0番目をlastEditedに保存

        } else {
            $lastEdited = null;
        }

        return view('profile.index', ['lastEdited' => $lastEdited]);

    }


}
