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
        Schema::create('join_projects', function (Blueprint $table) {
            $table->id();
            $table->boolean('status_id')->default(0);
            $table->date('DateStart');
            $table->date('DateEnd');
            $table->string('ProductName');
            $table->text('Description');
            
            // ✅ Thêm cột nhansu_id và khóa ngoại
            $table->foreignId('nhansu_id')->nullable()->constrained('nhansu')->nullOnDelete();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('join_projects');
    }
};
