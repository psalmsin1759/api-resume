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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string("name",100)->nullable();
            $table->string("title",100)->nullable();
            $table->text("about")->nullable();
            $table->string("phone",20)->nullable();
            $table->string("email",50)->nullable();
            $table->string("portfolio_url",50)->nullable();
            $table->string("github_url",50)->nullable();
            $table->string("linkedin_url",50)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
