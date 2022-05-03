<?php

use App\Models\Picture;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePictureTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('picture', function (Blueprint $table) {
            $table->id();
            // 대응하는 work 가 없는 경우도 상정합니다
            $table->foreignId('work_no')
                ->nullable()
                ->default(null)
                ->constrained('work', 'no')
                ->cascadeOnUpdate()
                ->nullOnDelete();
            $table->string('picture_year')
                ->default('')
                ->comment("년도");
            // 파일 경로는 Picture 모델에서 다룹니다
            $table->string('file_name')
                ->comment("파일이름");
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
        // 존재하는 picture 들을 직접 삭제합니다
        Picture::all()->each->delete();
        Schema::dropIfExists('picture');
    }
}
