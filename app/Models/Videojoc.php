<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Videojoc extends Model
{
	protected $fillable = ['titol', 'descripcio', 'preu', 'stock', 'imatge_url'];
}
