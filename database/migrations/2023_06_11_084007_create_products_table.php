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
            $table->integer('section_id');
            $table->integer('category_id');
            $table->integer('subcat_id');
            $table->integer('brand_id');
            $table->integer('vendor_id')->nullable();
            $table->integer('admin_id')->nullable();
            $table->integer('sub_admin_id')->nullable();
            $table->string('admin_type')->nullable();
            $table->string('name');
            $table->string('code');
            $table->string('color')->nullable();
            $table->string('price');
            $table->string('discount')->nullable();
            $table->string('weight')->nullable();
            $table->string('featured_image')->nullable();
            $table->string('video')->nullable();
            $table->string('short_description')->nullable();
            $table->string('long_description')->nullable();
            $table->string('url')->nullable();
            $table->string('meta_title')->nullable();
            $table->string('meta_description')->nullable();
            $table->string('meta_keywords')->nullable();
            $table->enum('is_featured',['No','Yes'])->nullable();
            $table->tinyInteger('status')->default(0);
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
