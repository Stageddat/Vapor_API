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
		Schema::create('videojocs', function (Blueprint $table) {
			$table->id();
			$table->string('titol');
			$table->text('descripcio');
			$table->decimal('preu', 8, 2);
			$table->integer('stock');
			$table->string('imatge_url');
			$table->timestamps();
		});
	}

	/**
	 * Reverse the migrations.
	 */
	public function down(): void
	{
		Schema::dropIfExists('videojocs');
	}
};
