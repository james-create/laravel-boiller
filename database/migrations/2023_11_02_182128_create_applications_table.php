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
        Schema::create('applications', function (Blueprint $table) {
            $table->id();
            $table->string('full_name');
            $table->string('dob');
            $table->string('gender');
            $table->string('citizenship');
            $table->string('national_id')->nullable();
            $table->string('birth_certificate');
            $table->string('passport_photo');
            $table->string('county_of_birth');
            $table->string('sub_county')->nullable();
            $table->string('ward')->nullable();
            $table->string('residency_area')->nullable();
            $table->string('index_number')->nullable();
            $table->string('year_of_exam')->nullable();
            $table->string('marks_attained')->nullable();
            $table->string('primary_school')->nullable();
            $table->string('father_name')->nullable();
            $table->string('mother_name')->nullable();
            $table->string('guardian_name')->nullable();
            $table->string('relationship')->nullable();
            $table->string('email')->nullable();

            $table->string('sport')->nullable();
            $table->string('contributions')->nullable();
            $table->string('sub_chief_name')->nullable();
            $table->string('address')->nullable();
            $table->string('chief_contact')->nullable();
            $table->string('score')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('applications');
    }
};
