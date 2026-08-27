<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('tech_stack_items', function (Blueprint $table) {
            // Constrained string (bukan MySQL enum native) — lebih mudah di-migrate
            // kalau opsinya nanti bertambah. Validasi nilai dilakukan di Form Request,
            // bukan di level database.
            // Nilai valid: 'not_started', 'in_progress', 'finished'.
            $table->string('status')->default('not_started')->after('display_order');
        });
    }

    public function down(): void
    {
        Schema::table('tech_stack_items', function (Blueprint $table) {
            $table->dropColumn('status');
        });
    }
};
