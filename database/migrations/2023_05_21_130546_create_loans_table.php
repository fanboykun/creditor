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
        if(!Schema::hasTable('loans'))
        {
            Schema::create('loans', function (Blueprint $table) {
                $table->engine = 'InnoDB';
                $table->id();
                $table->foreignId('user_id')->nullable()->constrained('users')->nullOnDelete();
                $table->foreignId('customer_id')->nullable()->constrained('customers')->cascadeOnDelete();
                $table->double('amount')->required();
                $table->double('interest')->nullable();
                $table->double('total')->nullable();
                $table->double('paid')->nullable();
                $table->double('remaining')->nullable();
                $table->boolean('status')->nullable()->default(false);
                $table->date('start_date')->nullable();
                $table->date('end_date')->nullable();
                $table->string('note')->nullable();
                $table->softDeletes();
                $table->timestamps();
            });
        }

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('loans');
    }
};
