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
        Schema::create('users', function (Blueprint $table) {
            $table->id('id');
            $table->string('name')->required();
            $table->string('email')->required()->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password')->required();
            $table->enum('role',['S', 'E', 'A'])->required();
            $table->unsignedBigInteger('specialty_id')->unsigned()->default(null);
            $table->rememberToken();

            $table->foreign('specialty_id')->references('id')->on('categories')->onDelete('cascade');

            $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
