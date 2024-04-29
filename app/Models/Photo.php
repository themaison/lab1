<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Photo extends Model
{
    use HasFactory;

    // Данные фотографий
    const PHOTOS = [
        ['filename' => '/images/bw1.jpg', 'caption' => 'Подпись 1'],
        ['filename' => '/images/bw2.jpg', 'caption' => 'Подпись 2'],
        ['filename' => '/images/bw3.jpg', 'caption' => 'Подпись 3'],
        ['filename' => '/images/bw4.jpg', 'caption' => 'Подпись 4'],
        ['filename' => '/images/bw5.jpg', 'caption' => 'Подпись 5'],
        ['filename' => '/images/bw6.jpg', 'caption' => 'Подпись 6'],
        ['filename' => '/images/bw2.jpg', 'caption' => 'Подпись 7'],
        ['filename' => '/images/bw1.jpg', 'caption' => 'Подпись 8'],
        ['filename' => '/images/bw3.jpg', 'caption' => 'Подпись 9'],
        ['filename' => '/images/bw1.jpg', 'caption' => 'Подпись 10'],
        ['filename' => '/images/bw2.jpg', 'caption' => 'Подпись 11'],
        ['filename' => '/images/bw6.jpg', 'caption' => 'Подпись 12'],
        ['filename' => '/images/bw4.jpg', 'caption' => 'Подпись 13'],
        ['filename' => '/images/bw3.jpg', 'caption' => 'Подпись 14'],
        ['filename' => '/images/bw2.jpg', 'caption' => 'Подпись 15'],
        ['filename' => '/images/bw6.jpg', 'caption' => 'Подпись 16'],
        ['filename' => '/images/bw1.jpg', 'caption' => 'Подпись 17'],
        ['filename' => '/images/bw3.jpg', 'caption' => 'Подпись 18'],
        ['filename' => '/images/bw4.jpg', 'caption' => 'Подпись 19'],
        ['filename' => '/images/bw2.jpg', 'caption' => 'Подпись 20'],
        ['filename' => '/images/bw6.jpg', 'caption' => 'Подпись 21'],
        ['filename' => '/images/bw2.jpg', 'caption' => 'Подпись 22'],
        ['filename' => '/images/bw5.jpg', 'caption' => 'Подпись 23'],

    ];
}
