<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeyUserPostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('posts', function (Blueprint $table)
        {

                //crea la colonna che sarà la key esterna//
            $table->unsignedBigInteger('user_id');

            //definizione key esterna e correlazione fra le 2 entità//
            $table->foreign('user_id')
                ->preferences('id')
                ->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('posts', function (Blueprint $table){
            $table->dropForeign('posts_user_id_foreign');
            $table->dropColumn('user_id');
        });
    }
}
