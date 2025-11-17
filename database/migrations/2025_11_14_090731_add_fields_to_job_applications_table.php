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
        Schema::table('job_applications', function (Blueprint $table) {
            $table->string('notice_period')->nullable()->after('resume');
            $table->string('experience')->nullable()->after('notice_period');
            $table->string('source')->nullable()->after('experience');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
         Schema::table('job_applications', function (Blueprint $table) {
            $table->dropColumn(['notice_period', 'experience', 'source']);
        });
    }
};
