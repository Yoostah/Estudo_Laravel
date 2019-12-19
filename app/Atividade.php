<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Atividade extends Model
{
    protected $table = 'atividades';

    //protected $primaryKey = 'atv_id'
    //public $incrementing = true
    //protected $keyType = 'integer';

    //created_at, updated_at
    public $timestamps = false;
    //const CREATED_AT = 'date_created'
    //const UPDATED_AT = 'date_updated'

    protected $fillable = ['name'];
}