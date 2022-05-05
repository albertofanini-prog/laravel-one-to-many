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
            
            //add column
            $table->unsignedBigInteger('category_id')->nullable()->after('slug'); //after posiziona il campo dopo la colonna nominata in after

            //add foreign
            $table->foreign('category_id')->references('id')->on('categories')->onDelete('set null'); //IL campo id ON table categories SE cancellato set null

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
            
            //drop foreign
            // $table->dropForeign('posts_category_id_foreign'); //schema chiavi esterne: nome tabella, nome chiave esterna, _foreign

            $table->dropForeign(['category_id']); //scorciatoia dropForeign

            //drop column
            $table->dropColumn('category_id');


        });
    }
}
