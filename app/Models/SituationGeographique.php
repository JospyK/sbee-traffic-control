<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use \DateTimeInterface;

class SituationGeographique extends Model
{
    use SoftDeletes;

    public $table = 'situation_geographiques';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'code',
        'libelle',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }

    public function situationGeographiqueUsers()
    {
        return $this->hasMany(User::class, 'situation_geographique_id', 'id');
    }
}
