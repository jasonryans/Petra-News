<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('news', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id'); // kolom user_id
            $table->string('title');
            $table->text('description');
            $table->date('start_date');
            $table->date('end_date');
            $table->string('image')->nullable();
            $table->string('youtube_link')->nullable();
            $table->string('category');
            $table->string('audience');
            $table->enum('status', ['pending', 'approved', 'rejected'])->default('pending');
            $table->timestamps();

            // FOREIGN KEY: user_id mengacu ke users_login.id
            $table->foreign('user_id')
                  ->references('id')
                  ->on('users_login')
                  ->onDelete('cascade');
        });
    }

    public function down(): void {
        // DROP DULU foreign key sebelum drop tabel (jaga-jaga)
        Schema::table('news', function (Blueprint $table) {
            $table->dropForeign(['user_id']);
        });

        Schema::dropIfExists('news');
    }
};
