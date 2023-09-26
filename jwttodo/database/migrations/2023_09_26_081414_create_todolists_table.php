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
        Schema::create('todolists', function (Blueprint $table) {
            $table->id();
            $table->date('PublishTime');
            $table->string('name');
            $table->string('information');
            $table->integer('status')->default('1');//1 for active, 0 for deactivated
            $table->integer('role')->nullable();//0 for user, 1 for admin, 2 for superadmin
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('todolists');
    }
};
