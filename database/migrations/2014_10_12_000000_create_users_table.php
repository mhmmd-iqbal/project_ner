<?php

use App\User;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('email')->unique();
            $table->string('username', 20)->unique();
            $table->string('image', 255)->nullable();
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();
        });

        User::firstOrCreate([
            'name'      => 'M iqbal',
            'email'     => 'admin@admin.com',
            'username'  => 'admin',
            'password'  => bcrypt('admin')
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
