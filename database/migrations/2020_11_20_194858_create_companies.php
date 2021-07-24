<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCompanies extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('companies', function (Blueprint $table) {

            $table->id();
            $table->string('name');
            $table->string('currency'); // e.g. AED / USD / SAR / PKR etc
            $table->string('country');
            $table->string('city');
            $table->text('address');
            $table->integer('phone_number')->nullable();
            $table->integer('whatsapp_number')->nullable();
            $table->double('latitude');
            $table->double('longitude');
            $table->string('website')->nullable();
            $table->text('business_hours')->nullable(); // will store weekly office hours in json or serialize format
            $table->text('license_path')->nullable(); // s3 bucket URL
            $table->text('logo_path')->nullable(); // s3 bucket or CDN URL
            $table->boolean('status')->default(true); // will store true / false (by default true);

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('companies');
    }
}
