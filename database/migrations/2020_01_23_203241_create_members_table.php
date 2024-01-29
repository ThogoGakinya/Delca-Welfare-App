<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMembersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('members', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->timestamps();
            $table->string('name');
            $table->integer('phone')->nullable();
            $table->integer('age')->nullable();
            $table->string('email');
            $table->integer('idno')->nullable();
            $table->longText('status')->nullable();
            $table->string('residence')->nullable();
            $table->string('fathername')->nullable();
            $table->string('fatherresidence')->nullable();
            $table->string('fatheralive')->nullable();
            $table->string('mothername')->nullable();
            $table->string('motherresidence')->nullable();
            $table->string('motheralive')->nullable();
            $table->string('child1')->nullable();
            $table->string('child2')->nullable();
            $table->string('child3')->nullable();
            $table->string('child4')->nullable();
            $table->string('child5')->nullable();
            $table->string('repname')->nullable();
            $table->string('repid')->nullable();
            $table->string('reprel')->nullable();
            $table->integer('regfee')->nullable();
            $table->string('paymentplan')->nullable();
            $table->integer('subscriptionfee')->nullable();
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('members');
    }
}
