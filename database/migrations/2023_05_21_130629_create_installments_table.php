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
        Schema::create('installments', function (Blueprint $table) {
            // $table->engine = 'InnoDB';
            $table->id();
            $table->foreignId('user_id')->nullable()->nullOnDelete();
            $table->foreignId('loan_id')->nullable()->cascadeOnDelete();
            $table->double('amount')->required();
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('installments');
    }
};
