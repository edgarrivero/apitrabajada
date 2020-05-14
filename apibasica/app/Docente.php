<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Docente
 *
 * @property int $id
 * @property string $nombre
 * @property int $salario
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Estudiante[] $estudiantes
 * @property-read int|null $estudiantes_count
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Docente newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Docente newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Docente query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Docente whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Docente whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Docente whereNombre($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Docente whereSalario($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Docente whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Docente extends Model
{
    protected $fillable = ['nombre', 'salario',];

    protected $with = ['estudiantes'];

    public function estudiantes(){
        return $this->hasMany('App\Estudiante');
    }
}
