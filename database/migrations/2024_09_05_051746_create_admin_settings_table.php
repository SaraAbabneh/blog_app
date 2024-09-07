<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('admin_settings', function (Blueprint $table) {
            $table->id(); // Primary key
            $table->foreignId('admin_id')->constrained('admins')->onDelete('cascade'); // Foreign key to the admins table
            $table->string('phone')->nullable()->unique(); // Admin phone number
            $table->enum('gender', ['male','female'])->nullable(); // Admin gender
            $table->string('photo')->nullable(); // Path to admin photo
            $table->string('address')->nullable(); // Admin address
            $table->timestamps(); // created_at and updated_at
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('admin_settings');
    }
};
