<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVenuesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::disableForeignKeyConstraints();

        Schema::create('venues', function (Blueprint $table) {
            $table->id();
            $table->string('name', 400);
            $table->text('description')->nullable();
            $table->string('address');
            $table->string('phone_number');
            $table->string('website_url');
            $table->text('covid_protocol')->nullable();
            $table->foreignId('neighborhood_id')->constrained();
            $table->timestamps();
        });

        Schema::enableForeignKeyConstraints();
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('venues');
    }
}
