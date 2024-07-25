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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_subcat');
            $table->foreign('id_subcat')->references('id')->on('subcategories')->onDelete('cascade');
            $table->string("title");
            $table->string("desc");
            $table->string("image");
            $table->integer("price");
            $table->integer("quantity");
            $table->integer("discount");
            
            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
