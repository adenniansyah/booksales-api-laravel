<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Author extends Model
{
    public static function getAllData()
    {
        return [
            ['id' => 1, 'nama' => 'J.K. Rowling'],
            ['id' => 2, 'nama' => 'Agatha Christie'],
            ['id' => 3, 'nama' => 'Tere Liye'],
            ['id' => 4, 'nama' => 'Eka Kurniawan'],
            ['id' => 5, 'nama' => 'Isaac Asimov'],
        ];
    }
}