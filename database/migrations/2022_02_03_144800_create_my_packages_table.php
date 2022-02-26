<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMyPackagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('my_packages', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->foreignId('package_id')->constrained();
            $table->foreignId('timeslot_id')->nullable()->constrained();
            $table->unsignedBigInteger('member_id');
            $table->unsignedBigInteger('trainer_id')->nullable();
            $table->foreign('member_id')->references('id')->on('users');
            $table->foreign('trainer_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('my_packages');
    }
}
