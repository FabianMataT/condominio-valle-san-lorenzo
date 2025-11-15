<?php

namespace Database\Seeders;

use App\Models\Form;
use App\Models\FormEntry;
use App\Models\FormEntryValue;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class FormEntrySeeder extends Seeder
{
    public function run(): void
    {
        $form1 = Form::where('name', 'Formulario de Quejas y Sugerencias')->first();
        $entry1 = FormEntry::create([
            'form_id' => $form1->id,
            'user_id' => 4,
        ]);

        foreach ($form1->fields as $field) {
            $value = match ($field->label) {
                'Titulo' => 'Ruido excesivo en la piscina',
                'Descripcion' => 'Durante las noches hay música alta después de las 10pm.',
                'Comentario' => 'Se sugiere colocar un horario de uso nocturno.',
                default => null,
            };

            FormEntryValue::create([
                'form_entry_id' => $entry1->id,
                'form_field_id' => $field->id,
                'value' => $value,
            ]);
        }

        $forms = Form::all();
        foreach ($forms as $form) {
            $entry = FormEntry::create([
                'form_id' => $form->id,
                'user_id' => 2,
            ]);

            foreach ($form->fields as $field) {
                $value = match ($field->name) {
                    'Titulo' => 'Evaluación de ' . $form->name,
                    'Descripcion' => 'Formulario completado para pruebas automáticas.',
                    'Calificacion' => rand(3, 5),
                    'Comentario' => 'Todo ha estado bien en general.',
                    'Imagen del reporte' => 'https://cdn-icons-png.flaticon.com/512/5766/5766976.png',
                    default => null,
                };

                FormEntryValue::create([
                    'form_entry_id' => $entry->id,
                    'form_field_id' => $field->id,
                    'value' => $value,
                ]);
            }
        }
    }
}
