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
            $table->string('order_id');
            $table->dateTime('lent_at');
            $table->dateTime('due_at');
            $table->dateTime('return_at')->nullable();
            $table->integer('price');
            $table->string('status_returned');
            $table->string('payment_status');
            $table->integer('amercement');
            $table->string('province');
            $table->string('city');
            $table->string('postal_code');
            $table->string('street');
            $table->string('snap_token', 36);
            $table->integer('donatur_id');
            $table->foreignId('user_id');
            $table->foreignId('book_id');
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
        Schema::dropIfExists('lents');
    }
};
