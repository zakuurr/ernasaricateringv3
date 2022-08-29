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
        Schema::create('menu', function (Blueprint $table) {
            $table->id();
            $table->string('nama_menu');
            $table->string('slug')->unique();
            $table->string('harga');
            $table->decimal('harga_diskon')->nullable();
            $table->enum('stock_status',['instock','outofstock']);
            $table->integer('stock')->default(10);
            $table->boolean('favorit')->default(false);
            $table->unsignedInteger('quantity')->default(10);
            $table->string('deskripsi');
            $table->string('foto')->nullable();
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
        Schema::dropIfExists('menu');
    }
};
