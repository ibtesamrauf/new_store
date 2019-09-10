<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use App\User;

class AddAdminUserTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $has_user = User::where('user_type','admin')->where('email','net_store@gmail.com')->exists();
        if(!$has_user){
            User::create([
                'user_type' => 'admin',
                'name' => 'Admin net store',
                'email' => 'net_store@gmail.com',
                'password' => bcrypt('net_store'),
            ]);     
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
