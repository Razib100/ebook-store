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
        if (!Schema::hasTable('payments')) {
            Schema::create('payments', function (Blueprint $table) {
                $table->id();
                $table->unsignedBigInteger('customer_id')->nullable();
                $table->string('name')->nullable();
                $table->string('email')->nullable();
                $table->decimal('amount', 10, 2)->default(0.00);
                $table->string('currency', 10)->default('usd');
                $table->string('payment_type')->default('stripe');
                $table->string('payment_method')->nullable();
                $table->string('payment_method_types')->nullable();
                $table->string('payment_id')->nullable();
                $table->string('client_secret')->nullable();
                $table->dateTime('date')->nullable();
                $table->tinyInteger('status')->default(0)->comment('1 = succeeded, 0 = failed/pending');
                $table->timestamps();
            });
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('payments');
    }
};
