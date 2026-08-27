<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('learning_log_entries', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('content');
            // 'exploring' atau 'production_ready' — divalidasi di Form Request,
            // bukan native enum (lihat docs/database_schema.md)
            $table->string('tag');
            $table->foreignId('related_project_id')
                ->nullable()
                ->constrained('projects')
                ->nullOnDelete();
            $table->date('published_at')->nullable();
            $table->string('status')->default('draft');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('learning_log_entries');
    }
};
