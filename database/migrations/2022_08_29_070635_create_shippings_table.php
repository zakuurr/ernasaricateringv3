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
        Schema::create('shippings', function (Blueprint $table) {
            $table->id();
            // $table->bigInteger('order_id')->unsigned();
            $table->string('nama_lengkap')->nullable();
            $table->string('nohp')->nullable();
            $table->string('email')->nullable();
            $table->text('alamat')->nullable();
            $table->text('alamat2')->nullable();
            $table->timestamps();
            $table->foreignId('order_id')->references('id')->on('orders')->onDelete('cascade')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('shippings');
    }
};
