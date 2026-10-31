<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreAutoresRequest;
use App\Http\Requests\UpdateAutoresRequest;
use App\Models\Autores;
use Illuminate\Http\JsonResponse;

class AutoresController extends Controller
{
    public function index()
    {
        return response()->json(Autores::with('libros')->get());
    }

    public function store(StoreAutoresRequest $request): JsonResponse
    {
        $autor = Autores::create($request->validated());

        return response()->json($autor, 201);
    }

    public function show(Autores $autores)
    {
        return response()->json($autores->load('libros'));
    }

    public function update(UpdateAutoresRequest $request, Autores $autores): JsonResponse
    {
        $autores->update($request->validated());

        return response()->json($autores->fresh());
    }

    public function destroy(Autores $autores): JsonResponse
    {
        $autores->delete();

        return response()->json(['message' => 'Autor eliminado con éxito.'], 200);
    }
}
