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
        Schema::create('documents', function (Blueprint $table) {
            $table->id();
            $table->foreignId('visa_application_id')->constrained()->onDelete('cascade');
            $table->string('name'); // e.g. 'Passport Scan'
            $table->string('path'); // filepath or storage path
            $table->enum('type', ['passport', 'id', 'photo', 'other'])->default('other');
            $table->enum('status', ['uploaded', 'under_review', 'approved', 'rejected'])->default('uploaded');
            $table->timestamps();
        });
    }
    
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('documents');
    }
};
