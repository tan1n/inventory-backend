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
        Schema::create('purchase_order_items', function (Blueprint $table) {
            $table->id();
            $table->string('purchase_order_info_id');
            $table->string('item')->nullable();
            $table->string('shade')->nullable();
            $table->string('dimension')->nullable();
            $table->string('uom')->nullable();
            $table->string('color')->nullable();
            $table->string('size')->nullable();
            $table->unsignedInteger('quantity')->nullable();
            $table->decimal('value', 20, 10)->nullable();
            $table->string('style_name')->nullable();
            $table->string('count')->nullable();
            $table->string('meter')->nullable();
            $table->decimal('quantity_cone',20,4)->nullable();
            $table->decimal('unit_price', 20, 10)->nullable();
            $table->decimal('total_price',20,4)->nullable();
            $table->text('remarks')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('purchase_order_items');
    }
};
