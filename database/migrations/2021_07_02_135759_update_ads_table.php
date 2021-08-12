<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateAdsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('ads', function (Blueprint $table){
            $table->unsignedBigInteger('city_id');
            $table->foreign('city_id')->references('id')->on('ad_cities')->cascadeOnDelete();

            $table->unsignedBigInteger('category_id');
            $table->foreign('category_id')->references('id')->on('ad_categories')->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
