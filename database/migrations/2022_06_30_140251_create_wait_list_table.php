<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWaitListTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('wait_lists', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('table_id');
            $table->unsignedBigInteger('customer_id');
            $table->foreign('table_id')->references('id')->on('tables');
            $table->foreign('customer_id')->references('id')->on('customers');
            $table->dateTime('preferred_from_date');
            $table->dateTime('preferred_to_date');
            $table->integer('number_of_guests');
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
        Schema::dropIfExists('wait_list');
    }
}
