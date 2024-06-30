<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductInfoTable extends Migration
{
    public function up()
    {
        Schema::create('product_info', function (Blueprint $table) {
            $table->id();
            $table->foreignId('product_id')->constrained();
            $table->string('username');
            $table->string('password');
            $table->enum('status', ['active', 'not_active'])->default('active');
            // Add any other fields as needed
        });
    }

    public function down()
    {
        Schema::dropIfExists('product_info');
    }
}
