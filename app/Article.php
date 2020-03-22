<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    // protected $table = 'articles';

    // protected $primeryKey = 'id';
    // public $incrementing = TRUE;
    // public $timestamps = TRUE; 

    protected $fillable = ['name','text'];
    // protected $guarded = ['name'];
    
    // Можно заранне определить типы данных для полей модели
    // protected $casts = [
    //     'name'=>'boolean',
    //     'text'=>'array'
    // ];

    public function user(){
        return $this->belongsTo('App\User');
    }

    // public function getNameAttribute($value){ // Метод читатель
    //     // При обращении к данному столбцу данные из этой функции добавляются к ней
    //     return 'Hello '.$value.' ---'; 
    // }

    // public function setNameAttribute($value){ // Метод преобразователь
    //     // При изменении данного столбца данные из этой функции добавляются к ней
    //     $this->attributes['name'] =  ' | '.$value.' | ';
    // }
}
