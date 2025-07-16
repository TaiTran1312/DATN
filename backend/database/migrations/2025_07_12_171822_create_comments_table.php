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
        Schema::create('comments', function (Blueprint $table) {
            $table->id(); // Tạo khóa chính (INT UNSIGNED AUTO_INCREMENT)
            $table->unsignedBigInteger('user_id')->nullable(); // Cho phép bình luận ẩn danh
            $table->text('body'); // Nội dung bình luận
            $table->timestamps(); // Tạo cột created_at & updated_at

            // Ràng buộc khóa ngoại
            $table->foreign('user_id')
                ->references('id')->on('users')
                ->onDelete('set null')
                ->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('comments');
    }
};
