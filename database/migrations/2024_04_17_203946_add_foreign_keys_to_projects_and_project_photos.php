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
        Schema::table('projects', function (Blueprint $table) {
            // projects tablosuna main_photo_id sütunu için dış anahtar ekleme
            $table->foreign('main_photo_id')->references('id')->on('project_photos')->onDelete('set null');
        });

        Schema::table('project_photos', function (Blueprint $table) {
            // project_photos tablosuna project_id sütunu için dış anahtar ekleme
            $table->foreign('project_id')->references('id')->on('projects')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('projects', function (Blueprint $table) {
            // projects tablosundan dış anahtarın silinmesi
            $table->dropForeign(['main_photo_id']);
        });

        Schema::table('project_photos', function (Blueprint $table) {
            // project_photos tablosundan dış anahtarın silinmesi
            $table->dropForeign(['project_id']);
        });
    }
};
