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
        Schema::create('roles', function (Blueprint $table) {
            $table->id();
            $table->string('name', 255);
        });

        Schema::create('permissions', function (Blueprint $table) {
            $table->id();
            $table->string('can');
            $table->string('detail');
        });

        Schema::create('information_fields', function (Blueprint $table) {
            $table->id();
            $table->string('field');
        });

        Schema::create('role_informations', function (Blueprint $table) {
            $table->id();
            $table->foreignId('role_id')->constrained();
            $table->foreignId('information_field_id')->constrained();
        });

        Schema::create('role_permissions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('role_id')->constrained();
            $table->foreignId('permission_id')->constrained();
        });

        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name', 255);
            $table->string('email', 161)->unique()->email();
            $table->foreignId('role_id')->constrained();
            $table->timestamps();
        });

        Schema::create('user_informations', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained();
            $table->foreignId('information_field_id')->constrained();
        });

        Schema::create('profiles', function (Blueprint $table) {
            $table->id();
            $table->integer('id_number');
            $table->string('name', 255);
            $table->string('birth_date', 255);
            $table->foreignId('user_id')->constrained();
        });

        Schema::create('faculty', function (Blueprint $table) {
            $table->id();
            $table->string('code', 255);
            $table->string('name', 255);
        });

        Schema::create('pengurus_fakultas', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained();
            $table->foreignId('faculties_id')->constrained(table: 'faculty');
        });


        Schema::create('sessions', function (Blueprint $table) {
            $table->string('id')->primary();
            $table->foreignId('user_id')->nullable()->index();
            $table->string('ip_address', 45)->nullable();
            $table->text('user_agent')->nullable();
            $table->longText('payload');
            $table->integer('last_activity')->index();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('roles');
        Schema::dropIfExists('information_fields');
        Schema::dropIfExists('role_informations');
        Schema::dropIfExists('role_permissions');
        Schema::dropIfExists('users');
        Schema::dropIfExists('user_informations');
        Schema::dropIfExists('profiles');
        Schema::dropIfExists('faculty');
        Schema::dropIfExists('pengurus_fakultas');
        Schema::dropIfExists('sessions');
        // Schema::dropIfExists('sessions');
    }
};
