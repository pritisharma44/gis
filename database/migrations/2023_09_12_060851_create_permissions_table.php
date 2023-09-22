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
        Schema::create('permissions', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->string('key')->nullable();  
            $table->text('parent_menu_id')->nullable();           
            $table->longText('route')->nullable();        
            $table->longText('sub_route')->nullable();
            $table->longText('icon')->nullable();
            $table->bigInteger('priority')->nullable();
            $table->enum('status',['active','inactive','deleted'])->default('active')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('permissions');
    }
};
