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
        Schema::create('orders', function (Blueprint $table) {
            $table->increments('order_id')->nullable(false);
            $table->unsignedInteger('customer_id')->nullable(false);
            $table->foreign('customer_id')->references('customer_id')->on('customers');
            $table->date('order_date')->nullable(false);
            $table->date('delivery_date')->nullable(false);
            $table->integer('amount')->nullable(false);
            $table->integer('quantity')->nullable(false);
            $table->enum('status', ['PENDING', 'PAID', 'CANCELLED']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
