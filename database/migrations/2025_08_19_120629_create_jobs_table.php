<?php

use App\Models\Employer;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('jobs', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Employer::class);
            $table->string('title');
            $table->string('company');
            $table->string('location');
            $table->integer('salary_min')->nullable();
            $table->integer('salary_max')->nullable();
            $table->string('experience_level')->nullable();
            $table->text('description')->nullable();
            $table->text('responsibilities')->nullable();
            $table->text('skills_required')->nullable();
            $table->text('about_company')->nullable();
            $table->string('schedule')->default('Full Time');
            $table->enum('apply_type', ['email', 'external'])->default('email');
            $table->string('apply_link')->nullable();
            $table->date('deadline')->nullable();
            $table->string('posted')->nullable();
            $table->string('status')->default('Active');
            $table->boolean('featured')->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('jobs');
    }
};
