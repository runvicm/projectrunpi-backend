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
        Schema::create('devlog_log_tags', function (Blueprint $table) {
            $table->id();
            $table->foreignId('log_id')->constrained('devlog_logs')->onDelete('cascade');
            $table->foreignId('tag_id')->constrained('devlog_tags')->onDelete('cascade');
            $table->timestamps();

            $table->unique(['log_id', 'tag_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('devlog_log_tags');
    }
};
