<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignCategoryPostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('posts', function (Blueprint $table) {
            // aggiiunta colonna
            $table->unsignedBigInteger('category_id')->nullable()->after('slug')->onDelete('set null');

            // aggiunta e collegamento foreign-key
            $table->foreign('category_id')->references('id')->on('categories');
            
            // metodo abbreviato ^riga 21-> $table->foreignId('category_id')->constrained();

        });
    }


    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('posts', function (Blueprint $table) {

            // rimozione foreing-key = (nomeTabella_nomeColonna_foreign)
            // $table->dropForeign('posts_category_id_foreign');

            // metodo ridotto = (nomeColonna dentro array)
            $table->dropForeign(['category_id']);

            // rimozione colonna
            $table->drop('category_id');
        });
    }
}
