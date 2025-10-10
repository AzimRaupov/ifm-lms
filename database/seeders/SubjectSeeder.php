<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SubjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $subjects = [
            'Математика',
            'Алгебра',
            'Геометрия',
            'Русский язык',
            'Литература',
            'Английский язык',
            'История',
            'Обществознание',
            'География',
            'Биология',
            'Физика',
            'Химия',
            'Информатика',
            'Физическая культура',
            'Музыка',
            'ИЗО',
            'Технология',
            'ОБЖ',
        ];

        foreach ($subjects as $subject) {
            DB::table('subjects')->updateOrInsert(
                ['subject' => $subject],
                ['created_at' => now(), 'updated_at' => now()]
            );
        }
    }
}
