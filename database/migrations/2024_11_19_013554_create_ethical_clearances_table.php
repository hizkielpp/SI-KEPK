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
        Schema::create('ethical_clearances', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('proposal_id');
            //define foreign key Constraint
            $table->foreign('proposal_id')->references('id')->on('proposals')->onDelete('cascade')->onUpdate('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ethical_clearances');
    }
};
