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
        Schema::create('job_candidates', function (Blueprint $table) {
            $table->id();
            $table->string('resume');
            $table->text('massage');
            $table->boolean('is_hired');
            $table->unsignedBigInteger('candidate_id');
            $table->foreignId('company_job_id')->constrained()->onDelete('cascade');
            $table->softDeletes();
            $table->timestamps();

            $table->foreign('candidate_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('job_candidates');
    }
};
