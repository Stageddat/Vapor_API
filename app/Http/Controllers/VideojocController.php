<?php

namespace App\Http\Controllers;

use App\Models\Videojoc;
use Illuminate\Http\Request;

class VideojocController extends Controller
{
	/**
	 * Display a listing of the resource.
	 */
	public function index()
	{
		$jocs = \App\Models\Videojoc::paginate(10);

		return view('videojocs.index', compact('jocs'));
	}

	/**
	 * Show the form for creating a new resource.
	 */
	public function create()
	{
		$videojoc = new \App\Models\Videojoc(); // Objecte buit
		$title = "Afegir nou videojoc";
		$textButton = "Publicar Joc";
		$route = route("videojocs.store"); // On enviarà les dades

		return view("videojocs.form", compact("videojoc", "title", "textButton", "route"));
	}
	/**
	 * Store a newly created resource in storage.
	 */
	public function store(Request $request)
	{
		$request->validate([
			"titol" => "required",
			"descripcio" => "required",
			"preu" => "required|numeric|min:0",
			"stock" => "required|integer|min:0",
			"imatge_url" => "required|string",
		]);

		\App\Models\Videojoc::create($request->all());

		return redirect(route("videojocs.index"))
			->with("success", "El joc " . $request->titol . " s'ha afegit a Vapor!");
	}

	/**
	 * Display the specified resource.
	 */
	public function show(Videojoc $videojoc)
	{
		return view("videojocs.show", compact("videojoc"));
	}

	/**
	 * Show the form for editing the specified resource.
	 */
	public function edit(Videojoc $videojoc)
	{
		$update = true;
		$title = __("Editar videojoc");
		$textButton = __("Actualitzar");
		// Passem el model a la ruta per generar la URL correcta (ex: /videojocs/5)
		$route = route("videojocs.update", ["videojoc" => $videojoc]);

		return view("videojocs.form", compact("videojoc", "update", "title", "textButton", "route"));
	}

	/**
	 * Update the specified resource in storage.
	 */
	public function update(Request $request, Videojoc $videojoc)
	{
		$request->validate([
			"titol" => "required",
			"descripcio" => "required",
			"preu" => "required|numeric|min:0",
			"stock" => "required|integer|min:0"
		]);

		$videojoc->update($request->all());

		return redirect()->route('videojocs.show', $videojoc)
			->with("success", __("El joc " . $videojoc->titol . " s'ha actualitzat correctament!"));
	}

	/**
	 * Remove the specified resource from storage.
	 */
	public function destroy(\App\Models\Videojoc $videojoc)
	{
		$nomJoc = $videojoc->titol;
		$videojoc->delete();

		return redirect()->route('videojocs.index')
			->with("success", __("El joc " . $nomJoc . " s'ha eliminat correctament de Vapor."));
	}
}
