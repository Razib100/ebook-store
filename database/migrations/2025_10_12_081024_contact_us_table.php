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
        if (!Schema::hasTable('contact_us')) {
            Schema::create('contact_us', function (Blueprint $table) {
                $table->increments('id');
                $table->string('title', 20)->nullable();
                $table->string('first_name', 20)->nullable();
                $table->string('email', 20)->nullable();
                $table->string('choose_sub', 20)->nullable();
                $table->text('message')->nullable();
                $table->string('file_des', 30)->nullable();
                $table->string('checkbox', 100)->nullable();
                $table->string('submit', 50)->nullable();
                $table->tinyInteger('status')->default(0)->comment('1 => active, 0 => inactive');
                $table->date('date')->nullable();
                $table->timestamps();
            });
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
