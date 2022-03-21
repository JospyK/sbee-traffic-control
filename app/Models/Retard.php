<?php

namespace App\Models;

use App\Traits\MultiTenantModelTrait;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use \DateTimeInterface;

class Retard extends Model
{
    use SoftDeletes, MultiTenantModelTrait;

    public $table = 'retards';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'duree',
        'user_id',
        'traffic_id',
        'created_at',
        'updated_at',
        'deleted_at',
        'team_id',
    ];

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }

    public static function boot()
    {
        parent::boot();
        Retard::observe(new \App\Observers\RetardActionObserver);
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function traffic()
    {
        return $this->belongsTo(Traffic::class, 'traffic_id');
    }

    public function team()
    {
        return $this->belongsTo(Team::class, 'team_id');
    }
}
