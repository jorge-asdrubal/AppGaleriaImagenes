<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id('id_user');
            $table->foreignId('id_rol')->references('id_rol')->on('roles')->onUpdate('Cascade');
            $table->string('name', 100);
            $table->string('email', 100)->unique();
            $table->string('password', 100);
            $table->rememberToken();
            $table->timestamps();
        });

        DB::table('users')->insert([
            'id_rol' => '1',
            'name' => 'jorge',
            'email' => 'jaog.11.2003@gmail.com',
            'password' => Hash::make('3116519569')
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
