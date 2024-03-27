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
        Schema::create('packages', function (Blueprint $table) {
            $table->id();
            $table->foreignId('category_id')->constrained('categories')->onDelete('cascade');
            $table->string('name');
            $table->string('location')->nullable();
            $table->string('map_lat')->nullable();
            $table->string('map_long')->nullable();
            $table->string('duration')->nullable();
            $table->string('person')->nullable();
            $table->text('expire_date')->nullable();

            $table->text('includes')->nullable();
            $table->text('excludes')->nullable();
            $table->longText('tour_plan')->nullable();

            $table->double('price');
            $table->longText('description')->nullable();
            $table->text('image')->nullable();
            $table->text('package_type')->nullable();

            $table->text('features')->nullable();
            $table->integer('is_feature')->default(1)->comment('1=>general; 2=>feature');;
            $table->integer('status')->default(1)->comment('1=>active; 2=>inactive');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('packages');
    }
};
