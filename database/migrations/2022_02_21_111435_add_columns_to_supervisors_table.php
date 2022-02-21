<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnsToSupervisorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('supervisors', function (Blueprint $table) {
            $table->dropColumn(['department', 'class_name']);
            $table->unsignedBigInteger('course_id')->nullable();
            $table->unsignedBigInteger('department_id')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('supervisors', function (Blueprint $table) {
            $table->dropColumn(['course_id', 'department_id']);
            $table->string('department')->nullable();
            $table->string('class_name')->nullable();
        });
    }
}
