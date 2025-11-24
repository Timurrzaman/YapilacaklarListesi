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
            $table->string('kullanici_adi')->unique();
            $table->string('email')->unique();
            $table->string('password'); // Laravel standardı için 'sifre' -> 'password'
            $table->string('cinsiyet');
            $table->date('dogum_tarihi');
            $table->string('ulke');
            $table->rememberToken();
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

