<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    use HasFactory;

    protected   $guarded = array('id');

    public static $rules = array(
        'name' => 'required',
        'gender' => 'required',
        'hobby' => 'required',
        'introduction' => 'required',
    );

    // News Modelに関連付けを行う
    public function profile_histories()
    {
        return $this->hasMany('App\Models\Profile_History');
    }
    // 追記ここまで

}
