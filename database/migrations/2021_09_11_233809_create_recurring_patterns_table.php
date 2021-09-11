<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRecurringPatternsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::disableForeignKeyConstraints();

        Schema::create('recurring_patterns', function (Blueprint $table) {
            $table->foreignId('event_id')->constrained()->primary();
            $table->string('recurring_type');
            $table->tinyInteger('repeat_interval')->nullable();
            $table->integer('max_occurrences')->nullable();
            $table->string('repeat_by_days', 2)->nullable();
            $table->tinyInteger('repeat_by_months')->nullable();
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
        Schema::dropIfExists('recurring_patterns');
    }
}
