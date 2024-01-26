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
        Schema::create('assets', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->date('creation_date')->nullable();
            $table->enum('depreciation_method',['straight_line','decline_balance']);
            $table->integer('useful_life');
            $table->foreignId('department_id')->constrained();
            $table->foreignId('asset_category_id')->constrained();
            $table->foreignId('user_id')->constrained();
            $table->string('acq_date');
            $table->string('description');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('assets');
    }
};
