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
        Schema::create('chat_discussion', function (Blueprint $table) {
            $table->id();
            $table->foreignId('sender')->constrained('users');
            $table->foreignId('discussion_id')->constrained('discussion');
            $table->string('chat')->nullable();
            $table->string('image')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('chat_discussion');
    }
};
