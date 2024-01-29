<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\author;
use App\Models\editorial;
use App\Models\status_book;

class books extends Model
{
    use HasFactory;


    public function editorial(){
        return $this->belongsTo(editorial::class, 'id_editorial');   // Las compañias tienen un solo dueño
    }


    public function author(){
        return $this->belongsTo(author::class, 'id_author');   // Las compañias tienen un solo dueño
    }

    public function estatus(){
        return $this->belongsTo(status_book::class, 'id_status');   // Las compañias tienen un solo dueño
    }



}
