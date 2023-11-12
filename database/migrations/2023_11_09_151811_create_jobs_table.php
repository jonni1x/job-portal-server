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
        Schema::create('jobs', function (Blueprint $table) {
            $table->id();
            $table->foreignId("category_id")->constrained()->onDelete('cascade');
            $table->string("title");
            $table->string("image")->nullable();
            $table->string("description");
            $table->integer("salary");
            $table->date("start");
            $table->json("skills");
            $table->string("location");
            $table->string("work_hour");
            $table->json("responsibilities");
            $table->json("benefits");
            $table->foreignId("company_id")->constrained()->onDelete('cascade');


            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('jobs');
    }
};
