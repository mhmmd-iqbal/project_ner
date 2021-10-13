<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDocumentFilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('document_files', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->bigInteger('document_id')->unsigned();
            $table->string('file_name', 100)->nullable();
            $table->softDeletes();
            $table->timestamps();

            $table->foreign('document_id')
            ->references('id')
            ->on('documents')
            ->constrained()
            ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('document_files');
    }
}
