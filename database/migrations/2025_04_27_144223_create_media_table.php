<?php

// database/migrations/YYYY_MM_DD_create_media_table.php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMediaTable extends Migration
{
    public function up()
    {
        Schema::create('media', function (Blueprint $table) {
            $table->id();
            $table->morphs('mediable'); // Polymorphic relationship: liên kết với model khác như News, Category...
            $table->string('type'); // Loại file: image, audio, video
            $table->string('path'); // Đường dẫn đến file đã lưu trong storage
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('media');
    }
}

