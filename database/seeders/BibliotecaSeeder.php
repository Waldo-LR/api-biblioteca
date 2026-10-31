<?php

namespace Database\Seeders;

use App\Models\Autores;
use App\Models\Libros;
use Illuminate\Database\Seeder;

class BibliotecaSeeder extends Seeder
{
    public function run(): void
    {
        $autor1 = Autores::create([
            'nombres' => 'Gabriel García Márquez',
            'nacionalidad' => 'Colombiana',
            'email' => 'gabriel@ejemplo.com',
        ]);

        $autor2 = Autores::create([
            'nombres' => 'Mario Vargas Llosa',
            'nacionalidad' => 'Peruana',
            'email' => 'mario@ejemplo.com',
        ]);

        $autor3 = Autores::create([
            'nombres' => 'Isabel Allende',
            'nacionalidad' => 'Chilena',
            'email' => 'isabel@ejemplo.com',
        ]);

        // Libros Autor 1 (3 libros)
        Libros::create([
            'autor_id' => $autor1->id,
            'titulo' => 'Cien años de soledad',
            'isbn' => '978-0307474728',
            'anio_publicacion' => 1967,
            'precio' => 45.50,
        ]);
        Libros::create([
            'autor_id' => $autor1->id,
            'titulo' => 'El amor en los tiempos del cólera',
            'isbn' => '978-0307387264',
            'anio_publicacion' => 1985,
            'precio' => 38.00,
        ]);
        Libros::create([
            'autor_id' => $autor1->id,
            'titulo' => 'Crónica de una muerte anunciada',
            'isbn' => '978-1400034956',
            'anio_publicacion' => 1981,
            'precio' => 25.00,
        ]);

        // Libros Autor 2 (4 libros)
        Libros::create([
            'autor_id' => $autor2->id,
            'titulo' => 'La ciudad y los perros',
            'isbn' => '978-8420471839',
            'anio_publicacion' => 1963,
            'precio' => 42.00,
        ]);
        Libros::create([
            'autor_id' => $autor2->id,
            'titulo' => 'Conversación en La Catedral',
            'isbn' => '978-8420467658',
            'anio_publicacion' => 1969,
            'precio' => 50.00,
        ]);
        Libros::create([
            'autor_id' => $autor2->id,
            'titulo' => 'La fiesta del Chivo',
            'isbn' => '978-8437604947',
            'anio_publicacion' => 2000,
            'precio' => 48.00,
        ]);
        Libros::create([
            'autor_id' => $autor2->id,
            'titulo' => 'Los cachorros',
            'isbn' => '978-8420633114',
            'anio_publicacion' => 1967,
            'precio' => 20.00,
        ]);

        // Libros Autor 3 (3 libros)
        Libros::create([
            'autor_id' => $autor3->id,
            'titulo' => 'La casa de los espíritus',
            'isbn' => '978-0307474773',
            'anio_publicacion' => 1982,
            'precio' => 39.90,
        ]);
        Libros::create([
            'autor_id' => $autor3->id,
            'titulo' => 'Paula',
            'isbn' => '978-0060927219',
            'anio_publicacion' => 1994,
            'precio' => 32.00,
        ]);
        Libros::create([
            'autor_id' => $autor3->id,
            'titulo' => 'Largo pétalo de mar',
            'isbn' => '978-1984899170',
            'anio_publicacion' => 2019,
            'precio' => 44.00,
        ]);
    }
}