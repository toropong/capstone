<?php

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
            $table->unsignedBigInteger('work_no');
            $table->foreign('work_no')
                ->references('no')
                ->on('work')
                ->cascadeOnDelete()
                ->cascadeOnUpdate();
            $table->string('year')
                ->default('')
                ->comment("년도");
            $table->string('file_path')
                ->comment("파일경로");
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
        Schema::dropIfExists('picture');
    }
}
