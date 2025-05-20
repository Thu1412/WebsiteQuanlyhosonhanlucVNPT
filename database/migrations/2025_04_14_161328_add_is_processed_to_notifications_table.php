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
    Schema::table('notifications', function (Blueprint $table) {
        $table->boolean('is_processed')->default(false); // Cột để đánh dấu trạng thái xử lý
    });
}

public function down()
{
    Schema::table('notifications', function (Blueprint $table) {
        $table->dropColumn('is_processed');
    });
}
};
