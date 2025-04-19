<?php

namespace Database\Seeders;

use App\Models\Project;
use Illuminate\Database\Seeder;

class ProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $projects = [
            [
                'name' => 'Rediseño de Sitio Web',
                'start_date' => '2025-01-15',
                'status' => 'En Progreso',
                'responsible' => 'Juan Pérez',
                'amount' => 15000.00,
            ],
            [
                'name' => 'Desarrollo de Aplicación Móvil',
                'start_date' => '2025-02-01',
                'status' => 'Pendiente',
                'responsible' => 'María Rodríguez',
                'amount' => 25000.00,
            ],
            [
                'name' => 'Migración de Base de Datos',
                'start_date' => '2025-01-10',
                'status' => 'Completado',
                'responsible' => 'Roberto Gómez',
                'amount' => 8500.00,
            ],
            [
                'name' => 'Actualización de Infraestructura de Red',
                'start_date' => '2025-03-01',
                'status' => 'Pendiente',
                'responsible' => 'Ana García',
                'amount' => 35000.00,
            ],
            [
                'name' => 'Auditoría de Seguridad',
                'start_date' => '2025-02-15',
                'status' => 'En Progreso',
                'responsible' => 'Carlos Martínez',
                'amount' => 12000.00,
            ],
        ];

        foreach ($projects as $project) {
            Project::create($project);
        }
    }
} 