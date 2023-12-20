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
        Schema::create('projects', function (Blueprint $table) {
            $table->id();
            $table->string('name')->required();
            $table->string('detail', $length=500);
            $table->float('marks')->default(0);
            $table->enum('status',['Marked','In Progress', 'No Evaluator Assigned'])->required()->default("No Evaluator Assigned");
            $table->unsignedBigInteger('member1_id')->unsigned()->required();
            $table->unsignedBigInteger('member2_id')->unsigned()->nullable();
            $table->unsignedBigInteger('member3_id')->unsigned()->nullable();
            $table->unsignedBigInteger('location_id')->unsigned()->unique()->nullable();
            $table->unsignedBigInteger('category_id')->unsigned()->unique()->nullable();
            
            $table->foreign('member1_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('member2_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('member3_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('location_id')->references('id')->on('locations')->onDelete('cascade');
            $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade');
            
            $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('projects');
    }
};
