<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('notifications', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('nhansu_id');  // Người nhận thông báo
            $table->unsignedBigInteger('sender_id');  // Người gửi thông báo (admin hoặc nhân sự)
            $table->text('message');
            $table->boolean('is_read')->default(false);
            $table->string('type');  // Thêm cột 'type'
            $table->timestamps();
        
            $table->foreign('nhansu_id')->references('id')->on('nhansu')->onDelete('cascade');
            $table->foreign('sender_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('notifications');
    }
};
