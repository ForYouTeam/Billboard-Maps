<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('billboards', function (Blueprint $table) {
            $table->id();
            $table->string('latitude' , 50);
            $table->string('longtitude' , 50);
            $table->text ('address' );
            $table->string('media_type' , 50);
            $table->string('pole_height', 5 );
            $table->string('height' , 5 );
            $table->string('width' , 5 );
            $table->text ('description', 5 );
            $table->integer ('price');
            $table->foreignId ('owner_id')->constrained('owners')->onDelete('cascade');
            $table->boolean ('empty')->default(null);
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
        Schema::dropIfExists('billboards');
    }
};
