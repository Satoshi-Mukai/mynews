<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Schema::create('profile_histories', function (Blueprint $table) {
        //     $table->id();
        //     $table->unsignedBigInteger('profile_id'); // 編集者が複数いることを想定してprofile_idを用意
        //     $table->string('edited_at');
        //     $table->timestamps();

        // });
        Schema::create('profile_histories', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('profile_id'); // 外部キー
            $table->string('edited_at');
            $table->timestamps();
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('profile_histories');
    }
};
