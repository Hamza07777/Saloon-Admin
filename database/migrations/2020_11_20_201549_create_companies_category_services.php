<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCompaniesCategoryServices extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('companies_category_services', function (Blueprint $table) {

            $table->id();
            $table->integer('company_id');
            $table->integer('category_id');
            $table->string('name');
            $table->text('description')->nullable();
            $table->double('price');
            $table->string('currency'); // Read from company table if available else user will provide
            $table->string('image'); // s3 bucket or CDN URL
            $table->boolean('status')->default(true); // will store true / false

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
        Schema::dropIfExists('companies_category_services');
    }
}
