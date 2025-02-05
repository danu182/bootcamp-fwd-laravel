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
        Schema::create('transaction', function (Blueprint $table) {
            $table->id();

            $table->foreignId('appointment_id')->nullable()->index('fk_transaction_to_appointment');

            $table->string('fee_doctor');
            $table->string('fee_specialist');
            $table->string('fee_hospital');
            $table->string('subtotal');
            $table->string('vat');
            $table->string('total');

            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transaction');
    }
};
