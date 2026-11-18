<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('detail_sales', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_sales');
            $table->unsignedBigInteger('id_produk');
            $table->integer('jumlah');
            $table->bigInteger('subtotal');
            $table->timestamps();

            $table->foreign('id_sales')
                  ->references('id_sales')
                  ->on('sales')
                  ->onDelete('cascade');

            $table->foreign('id_produk')
                  ->references('id_produk')
                  ->on('produk')
                  ->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('detail_sales');
    }
};