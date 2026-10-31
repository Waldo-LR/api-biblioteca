<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\LibrosRequest;
use App\Http\Resources\LibrosResource;
use App\Models\Libros;
use App\Policies\LibrosPolicy;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class LibrosController extends Controller
{
    public function index(): AnonymousResourceCollection
    {
        $libros = Libros::with('autor')->get();
        return LibrosResource::collection($libros);
    }

    public function store(LibrosRequest $request): JsonResponse
    {
        $libro = Libros::create($request->validated());
        $libro->load('autor');
        return (new LibrosResource($libro))
            ->response()
            ->setStatusCode(201);
    }

    public function show(Libros $libro): LibrosResource
    {
        $libro->load('autor');
        return new LibrosResource($libro);
    }

    public function update(LibrosRequest $request, Libros $libro): LibrosResource
    {
        $libro->update($request->validated());
        $libro->load('autor');
        return new LibrosResource($libro);
    }

    public function destroy(Libros $libro): JsonResponse
    {
        $libro->delete();
        return response()->json(['message' => 'Libro eliminado con éxito.'], 200);
    }
}