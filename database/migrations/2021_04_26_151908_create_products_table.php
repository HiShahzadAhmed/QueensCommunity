<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('slug');
            $table->string('uuid');
            $table->text('detail')->nullable();
            $table->text('image');
            $table->text('url');
            $table->float('price', 8, 2)->nullable()->default(0);
            $table->enum('position', ['bottom', 'sidebar'])->default('bottom');
            $table->enum('status', ['active', 'pending', 'cancelled'])->default('active');
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
        Schema::dropIfExists('products');
    }
}
