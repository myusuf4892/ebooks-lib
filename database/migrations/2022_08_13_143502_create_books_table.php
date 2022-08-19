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
        Schema::create('books', function (Blueprint $table) {
            $table->id();
            $table->string('isbn');
            $table->string('image');
            $table->string('title');
            $table->string('author');
            $table->string('publisher');
            $table->longText('description');
            $table->integer('price');
            $table->integer('stock');
            $table->enum('status', ['verified', 'verification']);
            $table->string('user_id');
            $table->foreignId('category_id');
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
        Schema::dropIfExists('book_details');
    }
};
