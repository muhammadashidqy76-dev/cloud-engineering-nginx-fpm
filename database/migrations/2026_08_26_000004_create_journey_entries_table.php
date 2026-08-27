<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('journey_entries', function (Blueprint $table) {
            $table->id();
            $table->string('course_name');
            $table->string('source')->nullable();
            // Pola wajib: learned -> applied -> result (lihat skill portfolio-narrative)
            $table->text('learned');
            $table->foreignId('applied_project_id')
                ->nullable()
                ->constrained('projects')
                ->nullOnDelete();
            $table->text('result');
            $table->date('completed_at')->nullable();
            $table->unsignedInteger('display_order')->default(0);
            $table->string('status')->default('draft');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('journey_entries');
    }
};
