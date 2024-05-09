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
        Schema::table('products', function (Blueprint $table) {
            // main_photo_id sütununa referans veren yabancı anahtar
            $table->foreign('main_photo_id')->references('id')->on('product_photos')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('products', function (Blueprint $table) {
            // Yabancı anahtarı silelim
            $table->dropForeign(['main_photo_id']);
        });
    }
};
