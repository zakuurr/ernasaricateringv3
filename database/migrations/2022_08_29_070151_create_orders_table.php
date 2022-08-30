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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            // $table->bigInteger('user_id')->unsigned();
            $table->string('subtotal')->nullable();
            $table->string('tax')->nullable();
            $table->string('total')->nullable();
            $table->string('nama_lengkap')->nullable();
            $table->string('nohp')->nullable();
            $table->string('email')->nullable();
            $table->text('alamat')->nullable();
            $table->text('alamat2')->nullable();
            $table->enum('status',['dipesan','dikirim','cancel'])->default('dipesan');
            $table->boolean('is_shipping_different')->default(false);
            $table->timestamps();

            $table->foreignId('user_id')->references('id')->on('users')->onDelete('cascade')->nullable();
            $table->text('catatan')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('orders');
    }
};
