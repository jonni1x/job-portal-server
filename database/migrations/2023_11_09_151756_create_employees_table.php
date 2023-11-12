
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
        Schema::create('employees', function (Blueprint $table) {
            $table->id();
            $table->foreignId("user_id")->constrained()->onDelete('cascade');
            $table->foreignId("address_id")->constrained()->onDelete('cascade');
            $table->foreignId("category_id")->constrained()->onDelete('cascade');
            $table->string("salary");
            $table->json("skills");
            $table->json("professions");
            $table->date("birth");
            $table->string("photo");
            $table->string("gender");

           $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('employees');
    }
};
