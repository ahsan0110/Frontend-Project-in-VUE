<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
{
    Schema::create('meta_tags', function (Blueprint $table) {
        $table->id();
        $table->unsignedBigInteger('page_id');
        $table->string('meta_name');
        $table->string('meta_value');
        
        $table->timestamps();

        $table->foreign('page_id')
            ->references('id')
            ->on('pages')
            ->onDelete('cascade');
    });
}
    public function down(): void
    {
        Schema::dropIfExists('meta_tags');
    }
};
