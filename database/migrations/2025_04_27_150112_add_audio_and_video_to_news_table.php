<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddAudioAndVideoToNewsTable extends Migration
{
    /**
     * Thực thi migration.
     *
     * @return void
     */public function up()
{
    Schema::table('news', function (Blueprint $table) {
        $table->string('audio_url')->nullable();
        $table->string('video_url')->nullable();
    });

}


    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('news', function (Blueprint $table) {
            if (Schema::hasColumn('news', 'audio_url')) {
                $table->dropColumn('audio_url');
            }
            if (Schema::hasColumn('news', 'video_url')) {
                $table->dropColumn('video_url');
            }
        });
    }
}
