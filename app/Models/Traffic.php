<?php

namespace App\Models;

use App\Traits\Auditable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use \DateTimeInterface;
use Carbon\Carbon;

class Traffic extends Model
{
    use SoftDeletes, Auditable;

    public $table = 'traffic';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'entre',
        'sortie',
        'user_id',
        'temperature',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }

    public function trafficRetards()
    {
        return $this->hasMany(Retard::class, 'traffic_id', 'id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function getDurationAttribute()
    {
        if ($this->sortie) {
            $start = Carbon::parse($this->entre);
            $end = Carbon::parse($this->sortie);
            $duration = $end->diffInSeconds($start);
            return gmdate('H:i:s', $duration);
        } else {
            return null;
        }
    }
}
