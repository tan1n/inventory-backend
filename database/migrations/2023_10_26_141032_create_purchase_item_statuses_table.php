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
        Schema::create('purchase_item_statuses', function (Blueprint $table) {
            $table->id();
            $table->foreignId('purchase_order_items_id')->nullable();
            $table->enum('status', ['reject','in'])->default('in');
            $table->decimal('remaining_quantity', 20, 10)->nullable();
            $table->decimal('received_quantity', 20, 10)->nullable();
            $table->decimal('current_quantity', 20, 10)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('purchase_item_statuses');
    }
};
