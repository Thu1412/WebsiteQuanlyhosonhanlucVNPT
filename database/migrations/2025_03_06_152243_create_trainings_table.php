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
        Schema::create('trainings', function (Blueprint $table) {
            $table->id();
            $table->boolean('status_id');
            $table->date('DateStart');
            $table->date('DateEnd');
            $table->string('Unit');
            $table->string('JobTitle');
            $table->string('CourseTrain')->nullable();
            $table->string('OrganizeForm')->nullable(); // Thêm cột OrganizeForm
            $table->string('UnitTrain')->nullable(); // Thêm cột UnitTrain
            $table->text('ContentCommit')->nullable(); // Thêm cột ContentCommit
            $table->string('ResultTrain')->nullable(); // Thêm cột ResultTrain
            $table->string('ResultSubject')->nullable(); // Thêm cột ResultSubject
            $table->string('Status')->nullable(); // Thêm cột Status
            $table->integer('Score')->nullable(); // Thêm cột Score
            $table->decimal('CostTrain', 10, 2)->nullable(); // Thêm cột CostTrain
            $table->integer('TimeCommit')->nullable(); // Thêm cột TimeCommit
            $table->integer('TimeCommitRemain')->nullable(); // Thêm cột TimeCommitRemain
            $table->boolean('IssueCertificate')->nullable(); // Thêm cột IssueCertificate
            $table->text('Contract')->nullable(); // Thêm cột Contract
            $table->timestamps();

            // ✅ Thêm cột nhansu_id với khóa ngoại chính xác
            $table->foreignId('nhansu_id')->nullable()->constrained('nhansu')->onDelete('set null');
        });
    }
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('trainings', function (Blueprint $table) {
            $table->dropForeign(['nhansu_id']); // Xóa khóa ngoại trước khi drop bảng
        });

        Schema::dropIfExists('trainings');
    }
};
