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
        Schema::create('invoices', function (Blueprint $table) {
            $table->id('iv_id');
            $table->integer('invoice_code');
            $table->date('date');
            $table->bigInteger('customer_id');
            $table->text('address',255)->nullable();
            $table->text('notes',255)->nullable();
            $table->double('invoice_amount');
            $table->double('discount_amount')->nullable();
            $table->integer('enable_vat')->nullable();
            $table->double('total_vat')->nullable();
            $table->double('grand_total');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('invoices');
    }
};
