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
        Schema::create('company_profiles', function (Blueprint $table) {
            $table->id();
            $table->foreignId('employer_id')->constrained()->onDelete('cascade');
            $table->string('company_name');
            $table->string('industry')->nullable();
            $table->string('company_size')->nullable();
            $table->string('website')->nullable();
            $table->text('description')->nullable();
            $table->string('recruiter_name');
            $table->string('contact_phone')->nullable();
            $table->text('address')->nullable();
             $table->string('recruiter_email')->unique();
            $table->string('logo')->nullable();
            $table->enum('account_status', ['Active', 'Suspended', 'Pending Approval'])->default('Pending Approval');
            $table->enum('verified', ['Yes', 'No'])->default('No');
            $table->integer('jobs_posted')->default(0);
            $table->integer('applicants_received')->default(0);
            $table->datetime('last_login')->nullable();
            $table->integer('downloads')->default(0);
            $table->text('feedback')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('company_profiles');
    }
};
