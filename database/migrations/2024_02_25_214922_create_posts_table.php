<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title');
            $table->text('body');
            $table->timestamps(); // created_at , updated_at
        });
    }

    /**
     * Reverse the migrations.=> rollback the migrations
     */
    public function down(): void
    {
        //php artisan migrate:reset
        //will call this function
        Schema::dropIfExists('posts');
    }
};
