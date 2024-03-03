<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
{
    // Đầu tiên, tạo bảng categories
    Schema::create('categories',function(Blueprint $table){
        $table->increments('id');
        $table->string('name');
        $table->longText('descriptions');
        $table->timestamps();
    });

    // Sau đó, tạo bảng foods
    Schema::create('foods', function (Blueprint $table) {
        $table->increments('id');
        $table->string('name');
        $table->integer('count');
        $table->longText('descriptions');
        $table->timestamps();

        //foreign keys
        $table->unsignedInteger('category_id'); // Loại bỏ dấu ngoặc kép thừa
        $table->foreign('category_id')
                ->references('id')
                ->on('categories')
                ->onDelete('cascade');
                //->onDelete('set null');
    });
}


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('foods');
    }
};
