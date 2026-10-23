<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Genre extends Model
{
    public static function getAllData()
    {
        return [
            ['id' => 1, 'nama' => 'Fantasi'],
            ['id' => 2, 'nama' => 'Misteri'],
            ['id' => 3, 'nama' => 'Romansa'],
            ['id' => 4, 'nama' => 'Sejarah'],
            ['id' => 5, 'nama' => 'Sains Fiksi'],
        ];
    }
}
