<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePwlsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pwls', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('title');
            $table->string('slug');
            $table->string('uuid');
            $table->text('detail');
            $table->text('avatar');
            $table->text('cover_photo');
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
        Schema::dropIfExists('pwls');
    }
}
