<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReceptionistsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('receptionists', function (Blueprint $table) {
            $table->id();
            $table->string('name', 100)->unique();
            $table->string('email', 100)->unique();
            $table->unsignedBigInteger('national_id')->unique();
            $table->string('password');
            $table->string('phone')->unique();
            $table->binary('panned')->default(0)->nullable();
            $table->string('image')->default('default.jpg')->nullable();
            $table->rememberToken();
            $table->unsignedBigInteger('created_by')->nullable();

            $table->foreign('created_by')->references('id')->on('admins')->onDelete('cascade')->onUpdate('cascade');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('receptionists');
    }
}
