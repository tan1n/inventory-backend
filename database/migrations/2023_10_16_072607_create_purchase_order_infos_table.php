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
        Schema::create('purchase_order_infos', function (Blueprint $table) {
            $table->id();
            $table->string('ref_no')->unique()->index();
            $table->text('title')->nullable();
            $table->text('responsible_person')->nullable();
            $table->foreignId('user_id')->nullable();
            $table->string('po_ref')->nullable();
            $table->foreignId('supplier_id')->nullable();
            $table->foreignId('customer_id')->nullable();
            $table->string('delivery_place')->nullable();
            $table->date('date')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('purchase_order_infos');
    }
};
