<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreLibrosRequest;
use App\Http\Requests\UpdateLibrosRequest;
use App\Models\Libros;
use Illuminate\Http\JsonResponse;

class LibrosController extends Controller
{
    public function index()
    {
        return response()->json(Libros::with('autor')->get());
    }

    public function store(StoreLibrosRequest $request): JsonResponse
    {
        $libro = Libros::create($request->validated());

        return response()->json($libro->load('autor'), 201);
    }

    public function show(Libros $libros)
    {
        return response()->json($libros->load('autor'));
    }

    public function update(UpdateLibrosRequest $request, Libros $libros): JsonResponse
    {
        $libros->update($request->validated());

        return response()->json($libros->fresh()->load('autor'));
    }

    public function destroy(Libros $libros): JsonResponse
    {
        $libros->delete();

        return response()->json(['message' => 'Libro eliminado con éxito.'], 200);
    }
}
