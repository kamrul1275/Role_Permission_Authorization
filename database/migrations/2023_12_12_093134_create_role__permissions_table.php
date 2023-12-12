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
        Schema::create('role__permissions', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('role_is')->nullable();
            $table->foreign('role_is')->references('id')->on('roles')->onDelete('set null')->onUpdate('cascade');

            $table->unsignedBigInteger('permission_is')->nullable();
            $table->foreign('permission_is')->references('id')->on('permissions')->onDelete('set null')->onUpdate('cascade');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('role__permissions');
    }
};
