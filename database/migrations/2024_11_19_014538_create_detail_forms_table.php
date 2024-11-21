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
        Schema::create('detail_forms', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('form_id');
            //define foreign key Constraint
            $table->foreign('form_id')->references('id')->on('forms')->onDelete('cascade')->onUpdate('cascade');
            $table->string('input_name');
            $table->string('input_description');
            $table->string('input_type');
            $table->string('input_value');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('detail_forms');
    }
};
