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
        Schema::create('admins', function (Blueprint $table) {
            $table->id(); // id column
            $table->string('username')->unique(); // username column
            $table->string('name'); // name column
            $table->string('email')->unique(); // email column, must be unique
            $table->string('password'); // password column
            $table->foreignId('added_by')->nullable()->constrained('users')->onDelete('set null'); // added_by column with a foreign key reference
            $table->timestamps(); // created_at and updated_at columns
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('admins');
    }

};
