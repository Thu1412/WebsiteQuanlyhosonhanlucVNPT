<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNhansuTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('nhansu', function (Blueprint $table) {
            $table->bigIncrements('id'); // Đổi từ increments() thành bigIncrements()
            $table->string('hoten')->nullable();
            $table->string('gioitinh')->nullable();
            $table->date('ngaysinh')->nullable();
            $table->string('sodienthoai')->nullable();
            $table->string('hinhanh')->nullable();
            $table->string('email')->nullable();
            $table->text('diachi')->nullable();
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
        Schema::dropIfExists('nhansu');
    }
}
