<?php

namespace Database\Seeders;

use App\Models\Form;
use App\Models\FormField;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class FormSeeder extends Seeder
{
    public function run(): void
    {
        $forms = [
            [
                'name' => 'Formulario de Quejas y Sugerencias',
                'description' => 'Permite reportar quejas o sugerencias sobre el condominio.',
                'img_url' => 'https://unade.edu.mx/wp-content/uploads/2022/02/Buzon-de-quejas-y-sugerencias-empresa.jpg',
                'created_by' => 1,
                'slug' => 'formulario-de-quejas-y-sugerencias',
                'fields' => [
                    ['label' => 'Titulo', 'type' => 'text', 'required' => true],
                    ['label' => 'Descripcion', 'type' => 'textarea'],
                    ['label' => 'Comentario', 'descrip' => 'Por favor, detalle su respuesta', 'type' => 'textarea'],
                ],
            ],
            [
                'name' => 'Opinión sobre el condómino',
                'description' => 'Evalúa la convivencia y colaboración de los residentes.',
                'img_url' => 'https://www.novogar.cr/wp-content/uploads/2023/07/comodidades-de-los-condominios-.webp',
                'created_by' => 1,
                'slug' => 'opinion-sobre-el-condomino',
                'fields' => [
                    ['label' => 'Titulo', 'type' => 'text', 'required' => true],
                    ['label' => 'Descripcion', 'type' => 'textarea'],
                    ['label' => 'Calificacion', 'type' => 'rating'],
                    ['label' => 'Comentario', 'type' => 'textarea'],
                ]
            ],
            [
                'name' => 'Formulario de horarios y guardias',
                'description' => 'Evalúa la puntualidad y desempeño del personal de seguridad.',
                'img_url' => 'https://creatuaplicacion.com/wp-content/uploads/2019/02/crear-guardias.png',
                'created_by' => 1,
                'slug' => 'formulario-de-horarios-y-guardias',
                'fields' => [
                    ['label' => 'Titulo', 'type' => 'text', 'required' => true],
                    ['label' => 'Descripcion', 'type' => 'textarea'],
                    ['label' => 'Imagen del reporte', 'type' => 'image'],
                    ['label' => 'Comentario', 'type' => 'textarea'],
                ],
            ],
        ];

        foreach ($forms as $data) {
            $form = Form::create([
                'created_by' => $data['created_by'],
                'name' => $data['name'],
                'description' => $data['description'],
                'img_url' => $data['img_url'],
                'slug' => $data['slug'],
            ]);

            foreach ($data['fields'] as $i => $field) {
                FormField::create([
                    'form_id' => $form->id,
                    'label' => $field['label'],
                    'description' => $field['descrip']?? null,
                    'type' => $field['type'],
                    'required' => $field['required'] ?? false,
                    'order' => $i,
                ]);
            }
        }
    }
}
