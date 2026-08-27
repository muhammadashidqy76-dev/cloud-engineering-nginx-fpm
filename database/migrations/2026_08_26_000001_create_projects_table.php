<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('projects', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('slug')->unique();
            // 1 = E-Commerce, 2 = API-only/Headless Backend, 3 = CMS
            $table->unsignedTinyInteger('complexity_order');
            $table->text('problem_statement');
            $table->text('architecture_decision_summary')->nullable();
            $table->string('impact_metric')->nullable();
            $table->string('preview_image_path')->nullable();
            // constrained string, bukan native enum — lihat docs/database_schema.md
            $table->string('status')->default('draft');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('projects');
    }
};
