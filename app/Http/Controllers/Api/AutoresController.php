<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\AutoresRequest;
use App\Http\Resources\AutoresResource;
use App\Http\Resources\LibrosResource;
use App\Models\Autores;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class AutoresController extends Controller
{
    public function index(): AnonymousResourceCollection
    {
        $autores = Autores::all();
        return AutoresResource::collection($autores);
    }

    public function store(AutoresRequest $request): JsonResponse
    {
        $autor = Autores::create($request->validated());
        return (new AutoresResource($autor))
            ->response()
            ->setStatusCode(201);
    }

    public function show(Autores $autore): AutoresResource
    {
        return new AutoresResource($autore);
    }

    public function update(AutoresRequest $request, Autores $autore): AutoresResource
    {
        $autore->update($request->validated());
        return new AutoresResource($autore);
    }

    public function destroy(Autores $autore): JsonResponse
    {
        $autore->delete();
        return response()->json(['message' => 'Autor eliminado con éxito.'], 200);
    }

    public function obtenerLibros(Autores $autore): AnonymousResourceCollection
    {
        // Eager loading de la relación libros
        $autore->load('libros');
        return LibrosResource::collection($autore->libros);
    }
}