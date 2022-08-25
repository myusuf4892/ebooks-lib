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
        Schema::create('lents', function (Blueprint $table) {
            $table->id();
            $table->dateTime('lent_at');
            $table->dateTime('due_at');
            $table->dateTime('return_at')->nullable();
            $table->integer('price');
            $table->string('status');
            $table->integer('amercement');
            $table->foreignId('user_id');
            $table->foreignId('book_id');
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
        Schema::dropIfExists('lents');
    }
};
