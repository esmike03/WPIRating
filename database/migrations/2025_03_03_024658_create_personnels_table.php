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
        Schema::create('personnels', function (Blueprint $table) {
            $table->id();
            $table->date('date');
            $table->string('area_code');
            $table->string('agent_name');
            $table->string('partner_name');
            $table->string('supervisor_name');
            $table->string('manager_name');
            $table->json('personalrelations');
            $table->json('grooming');
            $table->json('stocks');
            $table->json('expenses');
            $table->string('comments');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('personnels');
    }
};
