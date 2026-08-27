<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('tech_stack_items', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            // dikelompokkan per kategori (Backend, Database, Tools, dst) — lihat AGENTS.md
            $table->string('category');
            $table->unsignedInteger('display_order')->default(0);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('tech_stack_items');
    }
};
