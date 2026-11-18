<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('sales', function (Blueprint $table) {
            $table->id('id_sales');

            $table->unsignedBigInteger('id_customer');

            $table->date('tanggal_sales');
            $table->bigInteger('total_harga');

            $table->timestamps();

            $table->foreign('id_customer')
                  ->references('id_customer')
                  ->on('customer')
                  ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sales');
    }
};