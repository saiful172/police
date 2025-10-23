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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->integer('employee_id')->unique();
            $table->string('mobile_number', 15)->unique();
            $table->text('full_name');
            $table->string('designation', 100);
            $table->string('nationality', 100);
            $table->string('fathers_name_design_nation');
            $table->text('permanent_address_details');           
            $table->date('birth_date');
            $table->text('birth_place');
            $table->timestamps();
        });

        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
