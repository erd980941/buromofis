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
        Schema::create('social_media', function (Blueprint $table) {
            $table->id();
            $table->string('name'); // Sosyal medya platformunun adı (örneğin: Facebook, Twitter, Instagram)
            $table->string('link'); // Sosyal medya hesabının linki
            $table->string('icon'); // Sosyal medya ikonunun CSS sınıfı (örneğin: "bi bi-facebook" gibi)
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('social_media');
    }
};
