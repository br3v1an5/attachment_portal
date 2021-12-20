<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAttachmentApplicationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('attachment_applications', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('student_id');
            $table->string("attached_dep");
            $table->string("org_email");
            $table->string("org_no");
            $table->string("insurance");
            $table->string("org_name");
            $table->date("start_date");
            $table->date("completion_date");
            $table->string("latitude")->nullable();
            $table->string("longitude")->nullable();
            $table->string("remark");
            $table->string("town");
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('attachment_applications');
    }
}
