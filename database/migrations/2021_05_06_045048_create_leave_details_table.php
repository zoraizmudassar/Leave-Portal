<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLeaveDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('leave_details', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('leave_type_id');
            $table->integer('leaves_used');
            $table->integer('leaves_balance');
            $table->integer('user_id');
            $table->integer('application_id');
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
        Schema::dropIfExists('leave_details');
    }
}
