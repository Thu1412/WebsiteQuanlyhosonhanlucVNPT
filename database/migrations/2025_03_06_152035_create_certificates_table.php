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
        Schema::create('certificates', function (Blueprint $table) {
            $table->id();
            $table->boolean('status_id');
            $table->date('DateStart');
            $table->date('DateEnd');
            $table->string('File')->nullable();
            $table->string('DegreeCertificate')->nullable();
            $table->string('TypeCertificate')->nullable();
            $table->string('FieldCertificate');  // ❌ Xóa `after`
            $table->string('LevelCertificate');  // ❌ Xóa `after`
            $table->string('BasisTrain');        // ❌ Xóa `after`
            $table->string('LocationTrain');     // ❌ Xóa `after`
            $table->string('Classification');    // ❌ Xóa `after`
            $table->decimal('Score', 8, 2);      // ❌ Xóa `after`
            $table->tinyInteger('SentStudy')->default(0);
            $table->tinyInteger('InternationalCertificate')->default(0);
            $table->date('DateCertificate')->nullable();
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
        Schema::table('certificates', function (Blueprint $table) {
            $table->dropForeign(['nhansu_id']); // Xóa khóa ngoại trước khi drop bảng
        });
        $table->dropColumn([
            'File',
            'FieldCertificate',
            'LevelCertificate',
            'BasisTrain',
            'DegreeCertificate',
            'TypeCertificate',
            'LocationTrain',
            'Classification',
            'Score',
            'SentStudy',
            'InternationalCertificate',
            'DateCertificate'
        ]);
        Schema::dropIfExists('certificates');
    }
};
