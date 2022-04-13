<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEventsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('events', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->text('description');
            $table->string('map',400);
            $table->enum('region',['Abruzzo','Basilicata','Calabria','Campania','Emilia Romagna','Friuli Venezia Giulia','Lazio','Liguria','Lombardia','Marche','Molise','Piemonte','Puglia','Sardegna','Sicilia','Toscana','Trentino-Alto Adige','Umbria',"Valle d Aosta",'Veneto']);
            $table->date('date');
            $table->string('title',30);
            $table->string('image',100);
            $table->mediumInteger('allTickets')->unsigned();
            $table->float('price',10,2);
            $table->smallInteger('discountPerc')->unsigned();
            $table->smallInteger('daysNumber')->unsigned();
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
        Schema::dropIfExists('events');
    }
}
