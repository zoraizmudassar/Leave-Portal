<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ChangeStatusChangedByColumnDefaultValue extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::table('applications', function ($table) {
            $table->integer('status_changed_by')->default(0)->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::table('applications', function (Blueprint $table) {
            $table->dropColumn('status_changed_by');
        });
    }

}
