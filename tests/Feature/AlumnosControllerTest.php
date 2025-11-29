<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Models\Alumno;

class AlumnosControllerTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function puede_crear_un_alumno()
    {
        $response = $this->post('/alumnos', [
            'codigo' => 'A001',
            'nombre' => 'María López',
            'correo' => 'maria@example.com',
            'fecha_nacimiento' => '2002-03-15',
            'sexo' => 'F',
            'carrera' => 'Diseño Gráfico',
        ]);

        $response->assertRedirect('/alumnos');
        $this->assertDatabaseHas('alumnos', ['nombre' => 'María López']);
    }

    /** @test */
    public function puede_listar_alumnos()
    {
        Alumno::factory()->create(['nombre' => 'Ana']);
        Alumno::factory()->create(['nombre' => 'Luz']);

        $response = $this->get('/alumnos');

        $response->assertStatus(200);
        $response->assertSee('Ana');
        $response->assertSee('Luz');
    }

    /** @test */
    public function puede_actualizar_un_alumno()
    {
        $alumno = Alumno::factory()->create(['nombre' => 'Carla']);

        $response = $this->put("/alumnos/{$alumno->id}", [
            'codigo' => $alumno->codigo,
            'nombre' => 'Carla Actualizada',
            'correo' => $alumno->correo,
            'fecha_nacimiento' => $alumno->fecha_nacimiento,
            'sexo' => $alumno->sexo,
            'carrera' => $alumno->carrera,
        ]);

        $response->assertRedirect('/alumnos');
        $this->assertDatabaseHas('alumnos', ['nombre' => 'Carla Actualizada']);
    }

    /** @test */
    public function puede_eliminar_un_alumno()
    {
        $alumno = Alumno::factory()->create();

        $response = $this->delete("/alumnos/{$alumno->id}");

        $response->assertRedirect('/alumnos');
        $this->assertDatabaseMissing('alumnos', ['id' => $alumno->id]);
    }
}


