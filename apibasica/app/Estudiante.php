<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Estudiante
 *
 * @property int $id
 * @property string $nombre
 * @property int $edad
 * @property int $docente_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Docente $docente
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Estudiante newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Estudiante newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Estudiante query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Estudiante whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Estudiante whereDocenteId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Estudiante whereEdad($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Estudiante whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Estudiante whereNombre($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Estudiante whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Estudiante extends Model
{
    protected $fillable = [
        'nombre', 'edad', 'docente_id',
    ];


    public function docente(){
        return $this->belongsTo('App\Docente');
    }

    //event(new MyEvent('hello world'));
}
