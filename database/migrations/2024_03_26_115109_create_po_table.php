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
        Schema::create('po', function (Blueprint $table) {
            $table->id();
            $table->date('date');
            $table->unsignedBigInteger('distributor_id');
            $table->unsignedBigInteger('distributor_sub_id');
            $table->unsignedBigInteger('users_id');
            $table->unsignedBigInteger('region_id');
            $table->enum('status', ['draft', 'approved', 'rejected']);
            $table->text('active');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pos');
    }
};
