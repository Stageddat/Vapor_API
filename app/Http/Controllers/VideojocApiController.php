<?php

namespace App\Http\Controllers;

use App\Models\Videojoc;
use Illuminate\Http\Request;

class VideojocApiController extends Controller
{
	// GET /api/videojocs
	// pillar todo
	public function index()
	{
		$videojocs = Videojoc::all();
		return response()->json($videojocs);
	}

	// POST /api/videojocs
	// crear nous videojocs
	public function store(Request $request)
	{
		$videojoc = Videojoc::create([
			'titol'       => $request->titol,
			'descripcio'  => $request->descripcio,
			'preu'        => $request->preu,
			'stock'       => $request->stock,
			'imatge_url'  => $request->imatge_url,
		]);

		return response()->json($videojoc, 201);
	}

	// GET /api/videojocs/{id}
	// pillar uno
	public function show(int $id)
	{
		$videojoc = Videojoc::find($id);

		if (is_null($videojoc)) {
			return response()->json(["error" => "producte no trobat"], 404);
		}

		return response()->json($videojoc);
	}


	// PUT /api/videojocs/{id}
	// actualizar
	public function update(Request $request, int $id)
	{
		$videojoc = Videojoc::find($id);

		if (is_null($videojoc)) {
			return response()->json(["error" => "producte no trobat"], 404);
		}

		$videojoc->update([
			'titol'       => $request->titol       ?? $videojoc->titol,
			'descripcio'  => $request->descripcio  ?? $videojoc->descripcio,
			'preu'        => $request->preu         ?? $videojoc->preu,
			'stock'       => $request->stock        ?? $videojoc->stock,
			'imatge_url'  => $request->imatge_url   ?? $videojoc->imatge_url,
		]);

		return response()->json($videojoc);
	}

	// DELETE /api/videojocs/{id}
	// eliminar un
	public function destroy(int $id)
	{
		$videojoc = Videojoc::find($id);

		if (is_null($videojoc)) {
			return response()->json(["error" => "producte no trobat"], 404);
		}

		$videojoc->delete();

		return response()->json(["deleted" => "ok"]);
	}

	// DELETE /api/videojocs/deleteall
	// eliminar tots els productes
	public function destroyAll()
	{
		Videojoc::truncate();
		return response()->json(["deleted" => "all"]);
	}
}
