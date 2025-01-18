<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;


use App\Models\Profile;
use App\Models\Profile_History;
use Carbon\Carbon;

class ProfileController extends Controller
{

    public function add()
    {
        return view('admin.profile.create');
    }

    // 以下を追記（2025/01/07）
    public function create(Request $request)
    {
        //　Validationを行う
        $this->validate($request, Profile::$rules);
        $profile = new Profile;
        $form = $request->all();

        // フォームから送信されてきた_tokenを削除する
        unset($form['_token']);

        //データベースに保存する
        $profile->fill($form);
        $profile->save();

        return redirect('admin/profile/create');
    }

    public function edit(Request $request)
    {
        //Profile Modelからデータを取得する
        $profile = Profile::find($request->id);
        if (empty($profile)){
            abort(404);
        }
        return view('admin.profile.edit', ['profile_form' => $profile]);

    }


    public function update(Request $request)
    {
        //Validationをかける
        $this->validate($request, Profile::$rules);

        // profile Modelからデータを取得する
        $profile = Profile::find($request->id);

        // 送信されてきたフォームデータを格納する
        $profile_form = $request->all();

        unset($profile_form['remove']);
        unset($profile_form['_token']);

        //該当するデータを上書きして保存する
        $profile->fill($profile_form)->save();

        // 以下を追記
        $profile_history = new Profile_History();
        $profile_history->profile_id = $profile->id;
        $profile_history->edited_at = Carbon::now();
        $profile_history->save();
        // 追記ここまで


        return redirect('admin/profile/edit?id=1');//メイン編集者（id=1）の編集画面に今は戻るようにする
    }

}
