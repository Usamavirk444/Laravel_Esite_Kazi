<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('brnads', function (Blueprint $table) {
            $table->id();
            $table->string('brand_name');
            $table->string('brand_name_urdu');
            $table->string('brand_slug_eng');
            $table->string('brand_slug_urdu');
            $table->string('brand_img');
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
        Schema::dropIfExists('brnads');
    }
};
