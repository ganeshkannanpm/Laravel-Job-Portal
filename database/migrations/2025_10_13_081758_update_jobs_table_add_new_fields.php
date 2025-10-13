<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::table('jobs', function (Blueprint $table) {
            $table->string('experience_level')->after('location')->nullable();
            $table->integer('salary_min')->after('title')->nullable();
            $table->integer('salary_max')->after('salary_min')->nullable();
            $table->enum('apply_type', ['email', 'external'])->after('url')->default('email');
            $table->string('apply_link')->after('apply_type')->nullable();
            $table->date('deadline')->after('skills_required')->nullable();
        });
    }

    public function down(): void
    {
        Schema::table('jobs', function (Blueprint $table) {
            $table->dropColumn([
                'experience_level',
                'salary_min',
                'salary_max',
                'apply_type',
                'apply_link',
                'deadline'
            ]);
        });
    }
};
