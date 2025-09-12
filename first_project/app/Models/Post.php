<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model // Все св-ва и методы наследуются из класса Model
{
    use HasFactory;
    use SoftDeletes;
//    Урок 5. Модели.
    public $someProperty; // кастомное св-во
    protected $table = 'posts'; // явно указываем связь модели и миграции(таблицы)
    protected $guarded = []; // сознательное разрешение на добавление атрибутов в бд, те защищать никакой атрибут не нужно
    // protected $fillable = []; тож самое, но нужно будет все атрибуты обозначить
}
