<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('prices', function (Blueprint $table) {
            $table->id(); // TODO: Deze kan weg als relatie werkt
            $table->foreignId('product_id');
            $table->foreignId('supermarket_id');
            $table->string('sku');
            $table->integer('price');
        });
    }

    public function down()
    {
        Schema::dropIfExists('prices');
    }
};
