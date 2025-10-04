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
        Schema::table('jobs', function (Blueprint $table) {
            $table->text('description')->nullable()->after('featured');
            $table->text('responsibilities')->nullable()->after('description');
            $table->text('requirements')->nullable()->after('responsibilities');
            $table->text('skills_required')->nullable()->after('requirements');
            $table->text('about_company')->nullable()->after('skills_required');
            $table->string('posted')->nullable()->after('about_company');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('jobs', function (Blueprint $table) {
            $table->dropColumn([
                'description',
                'responsibilities',
                'requirements',
                'skills_required',
                'about_company',
                'posted',
            ]);
        });
    }
};
