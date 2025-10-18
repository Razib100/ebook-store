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
        Schema::create('authors', function (Blueprint $table) {
            $table->id();
            $table->integer('customer_id')->nullable();
            $table->string('name',191);                               // Author name
            $table->string('image',191)->nullable();
            $table->string('gender',25)->nullable();                  // Author profile image
            $table->string('short_description', 255)->nullable(); // Short intro / tagline
            $table->longText('description')->nullable();          // Full biography
            $table->date('dob')->nullable();                      // Date of birth
            $table->string('phone', 20)->nullable();              // Phone (limited length)
            $table->boolean('home_visible')->default(false);
            $table->tinyInteger('status')
                ->default(0)
                ->comment('1 = active, 0 = inactive');          // Active flag

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('authors');
    }
};
