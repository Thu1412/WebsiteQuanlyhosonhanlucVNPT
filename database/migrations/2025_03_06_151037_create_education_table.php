<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('educations', function (Blueprint $table) {
            $table->id();
            $table->boolean('status_id')->default(1); 
            $table->date('DateStart');
            $table->date('DateEnd');
            $table->string('File')->default('');
            $table->string('StandardTrain')->default('');
            $table->string('BasisTrain')->default('');
            $table->string('FormTrain')->default('');
            $table->string('TypeTrain')->default('');
            $table->string('DegreeClassific')->default('');
            $table->string('TitleTrain')->default('');
            $table->string('EducationLevel')->default('');
            $table->boolean('SentStudy')->default(0);

            // ✅ Đảm bảo kiểu dữ liệu đúng của nhansu_id
            $table->foreignId('nhansu_id')->nullable()->constrained('nhansu')->onDelete('set null');

            $table->timestamps();
        });
    }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('educations', function (Blueprint $table) {
            $table->dropForeign(['nhansu_id']); // Xóa khóa ngoại trước khi drop bảng
        });

        Schema::dropIfExists('educations');
    }
};
