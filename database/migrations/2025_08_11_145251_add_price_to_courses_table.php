<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddPriceToCoursesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('courses', function (Blueprint $table) {
            $table->decimal('price',12,2)->nullable();
        });

        Schema::table('services', function (Blueprint $table) {
            $table->decimal('price',12,2)->nullable();
        });

        Schema::table('banner_pages', function (Blueprint $table) {
            $table->string('link')->nullable();
            $table->string('text_button')->nullable();
            $table->string('subtitle')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('courses', function (Blueprint $table) {
            //
        });
    }
}
