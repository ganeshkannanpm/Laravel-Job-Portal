<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('notes', function (Blueprint $table) {

            $table->dateTime('reminder_date')
                ->nullable()
                ->after('mode')
                ->comment('Used for Reminder or Follow-up mode');

            $table->enum('status', ['Pending', 'Completed'])
                ->default('Pending')
                ->after('reminder_date');

            $table->foreignId('created_by')
                ->nullable()
                ->after('status')
                ->constrained('employers')
                ->nullOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('notes', function (Blueprint $table) {
            $table->dropForeign(['created_by']);
            $table->dropColumn(['reminder_date', 'status', 'created_by']);
        });
    }
};
