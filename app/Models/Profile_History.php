<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profile_History extends Model
{
    use HasFactory;
    // 以下を追記
    protected $table = 'profile_histories'; // 明示的にテーブル名を指定
    protected $guarded = array('id');

    public static $rules = array(
        'profile_id' => 'required',
        'edited_at' => 'required',
    );
    // 追記ここまで
}
