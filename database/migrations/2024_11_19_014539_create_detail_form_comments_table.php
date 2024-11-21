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
        Schema::create('detail_form_comments', function (Blueprint $table) {
            $table->id();
            // foreign key for detail_form
            $table->unsignedBigInteger('detail_form_id');
            //define foreign key Constraint
            $table->foreign('detail_form_id')->references('id')->on('detail_forms')->onDelete('cascade')->onUpdate('cascade');
            // foreign key for comment creator
            $table->unsignedBigInteger('user_id');
            // define foreign key Constraint
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
            $table->text('comment');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('detail_form_comments');
    }
};
