<?php

namespace App\Models;

use App\Traits\Auditable;
use Carbon\Carbon;
use Hash;
use Illuminate\Auth\Notifications\ResetPassword;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Passport\HasApiTokens;
use \DateTimeInterface;

class User extends Authenticatable
{
    use SoftDeletes, Notifiable, HasApiTokens, Auditable;

    public $table = 'users';

    protected $hidden = [
        'remember_token',
        'password',
    ];

    protected $dates = [
        'email_verified_at',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'nom',
        'prenom',
        'username',
        'email',
        'email_verified_at',
        'password',
        'remember_token',
        'created_at',
        'matricule',
        'direction_id',
        'situation_geographique_id',
        'updated_at',
        'deleted_at',
        'team_id',
    ];


    protected $username = 'username';

    # Accessors & Mutators
    public function getTrafficGroupbyDateAttribute()
    {
        return $this->userTraffic()->get()->groupBy(function ($item) {
            return $item->created_at->format('Y-m-d');
        });
    }

    public function getNameAttribute()
    {
        return "{$this->nom} {$this->prenom}";
    }

    public function getMatriculeNameAttribute()
    {
        return "{$this->matricule} - {$this->nom} {$this->prenom}";
    }

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }

    public function getIsAdminAttribute()
    {
        return $this->roles()->where('id', 1)->exists();
    }

    public function userTraffic()
    {
        return $this->hasMany(Traffic::class, 'user_id', 'id');
    }

    public function userRetards()
    {
        return $this->hasMany(Retard::class, 'user_id', 'id');
    }

    public function userUserAlerts()
    {
        return $this->belongsToMany(UserAlert::class);
    }

    public function userHoraires()
    {
        return $this->belongsToMany(Horaire::class);
    }

    public function getEmailVerifiedAtAttribute($value)
    {
        return $value ? Carbon::createFromFormat('Y-m-d H:i:s', $value)->format(config('panel.date_format') . ' ' . config('panel.time_format')) : null;
    }

    public function setEmailVerifiedAtAttribute($value)
    {
        $this->attributes['email_verified_at'] = $value ? Carbon::createFromFormat(config('panel.date_format') . ' ' . config('panel.time_format'), $value)->format('Y-m-d H:i:s') : null;
    }

    public function setPasswordAttribute($input)
    {
        if ($input) {
            $this->attributes['password'] = app('hash')->needsRehash($input) ? Hash::make($input) : $input;
        }
    }

    public function sendPasswordResetNotification($token)
    {
        $this->notify(new ResetPassword($token));
    }

    public function roles()
    {
        return $this->belongsToMany(Role::class);
    }

    public function horaires()
    {
        return $this->belongsToMany(Horaire::class);
    }

    public function team()
    {
        return $this->belongsTo(Team::class, 'team_id');
    }

    public function direction()
    {
        return $this->belongsTo(Direction::class, 'direction_id');
    }

    public function situation_geographique()
    {
        return $this->belongsTo(SituationGeographique::class, 'situation_geographique_id');
    }
}
