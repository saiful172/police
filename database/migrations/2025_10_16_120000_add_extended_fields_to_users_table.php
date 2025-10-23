<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('users', function (Blueprint $table) {
            // Addresses
            $table->text('present_address_details')->nullable()->after('permanent_address_details');

            // Freedom fighter relation
            $table->boolean('is_freedom_fighter_related')->default(false)->after('birth_place');
            $table->string('freedom_fighter_doc_path')->nullable()->after('is_freedom_fighter_related');

            // Disability
            $table->boolean('has_disability')->default(false)->after('freedom_fighter_doc_path');
            $table->string('disability_doc_path')->nullable()->after('has_disability');

            // Police case
            $table->boolean('has_police_case')->default(false)->after('disability_doc_path');
            $table->text('police_case_details')->nullable()->after('has_police_case');

            // Govt relatives flag (details in separate table)
            $table->boolean('has_govt_relative')->default(false)->after('police_case_details');

            // Testimonial file
            $table->string('testimonial_file_path')->nullable()->after('has_govt_relative');

            // Marital & partner nationality
            $table->boolean('is_married')->default(false)->after('testimonial_file_path');
            $table->string('partner_nationality')->nullable()->after('is_married');

            // Signature image
            $table->string('signature_file_path')->nullable()->after('partner_nationality');
        });
    }

    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn([
                'present_address_details',
                'is_freedom_fighter_related', 'freedom_fighter_doc_path',
                'has_disability', 'disability_doc_path',
                'has_police_case', 'police_case_details',
                'has_govt_relative',
                'testimonial_file_path',
                'is_married', 'partner_nationality',
                'signature_file_path',
            ]);
        });
    }
};