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
        Schema::create('product_histories', function (Blueprint $table) {
            $table->increments('product_histories_id')->nullable(false);
            $table->unsignedInteger('product_id');
            $table->unsignedInteger('supplier_id');
            $table->foreign('product_id')->references('product_id')->on('products');
            $table->foreign('supplier_id')->references('supplier_id')->on('suppliers');
            $table->string('transaction_type')->nullable();
            $table->unsignedInteger('quantity');
            $table->decimal('unit_price', 8, 2);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('product_histories');
    }
};
