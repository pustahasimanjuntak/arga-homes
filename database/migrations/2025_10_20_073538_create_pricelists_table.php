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
    Schema::create('pricelists', function (Blueprint $table) {
        $table->id();
        $table->string('service_name');
        $table->text('description')->nullable();
        $table->decimal('price', 10, 2);
        $table->integer('duration')->comment('durasi dalam menit');
        $table->boolean('is_active')->default(true);
        $table->timestamps();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pricelists');
    }
};
