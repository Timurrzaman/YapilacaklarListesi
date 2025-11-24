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
        Schema::table('tasks', function (Blueprint $table) {
            // 'id' sütunundan sonra 'user_id' sütununu ekle.
            // constrained() metodu, bu sütunun 'users' tablosundaki 'id'ye bağlı olduğunu belirtir.
            // cascadeOnDelete() metodu, bir kullanıcı silindiğinde ona ait tüm görevlerin de silinmesini sağlar.
            $table->foreignId('user_id')->after('id')->constrained()->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('tasks', function (Blueprint $table) {
            // Migration geri alınırsa, bu foreign key'i ve sütunu kaldır.
            $table->dropForeign(['user_id']);
            $table->dropColumn('user_id');
        });
    }
};
