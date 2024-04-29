<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Interest extends Model
{
    use HasFactory;

    // Данных моих интересов

    const INTERESTS = [
        'IT' => [
            [
                'interest' => 'Web-дизайн',
                'description' => 'Это мое основное направление, которое мне интересно. Мне нравится продумывать интерфейс пользователя, изучать различные паттерны поведения пользователей, изучать психологию людей и на основе этого рисовать дизайн сайта.'
            ],
            [
                'interest' => 'ReactJS',
                'description' => 'ReactJS - это JavaScript-библиотека для создания пользовательских интерфейсов. Она была разработана Facebook и сегодня широко используется для разработки веб-приложений.'
            ],
            [
                'interest' => 'Python',
                'description' => 'Python - это высокоуровневый язык программирования, который широко используется для разработки веб-приложений, анализа данных, искусственного интеллекта и многого другого.'
            ]
        ],
        'Творчество' => [
            [
                'interest' => 'Beats',
                'description' => 'Вечером я обычно люблю писать различную музыку. Для этого использую специальную программу FL Studio. Люблю писать биты в жанре трэп.'
            ],
            [
                'interest' => 'Монтаж видео',
                'description' => 'Монтаж видео - это процесс, в котором я собираю, редактирую и структурирую видеоматериалы, чтобы создать гармоничное и цельное видео. Это позволяет мне выразить свою креативность и рассказать уникальную историю через визуальные образы.'
            ],
            [
                'interest' => 'Рисование',
                'description' => 'Я люблю рисовать в свободное время. Это помогает мне расслабиться и выразить свои чувства и мысли через визуальное искусство.'
            ]
        ],
        'Развлечение' => [
            [
                'interest' => 'Аниме',
                'description' => 'Аниме - это не просто развлечение, это искусство, которое позволяет мне погрузиться в различные миры, истории и культуры. Я люблю аниме за его уникальные сюжеты, глубокие персонажи и впечатляющую анимацию. Исходя из фотоальбома можно понять мое любимое аниме - "Атака Титанов".'
            ],
            [
                'interest' => 'Видеоигры',
                'description' => 'Я люблю играть в видеоигры в свободное время. Они предлагают уникальные истории и миры, которые я могу исследовать, и позволяют мне испытать новые испытания и приключения.'
            ]
        ]
    ];
    
}