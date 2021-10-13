<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateQuotationFormatsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('quotation_formats', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->text('formatted')->nullable();
            $table->text('fixed_string')->nullable();
            $table->boolean('name')->default(false);
            $table->boolean('punctuation')->default(false);
            $table->softDeletes();
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
        Schema::dropIfExists('quotation_formats');
    }
}
