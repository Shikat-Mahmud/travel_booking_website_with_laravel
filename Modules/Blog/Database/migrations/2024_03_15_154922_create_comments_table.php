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
        Schema::create('comments', function (Blueprint $table) {
            $table->id();
        $table->unsignedBigInteger('blog_id');
        $table->foreign('blog_id')->references('id')->on('blogs')->onDelete('cascade');
        $table->string('name');
        $table->string('email');
        $table->string('phone');
        $table->text('comment');
        $table->enum('status', ['pending', 'approved'])->default('pending');
        $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('comments');
    }
};
