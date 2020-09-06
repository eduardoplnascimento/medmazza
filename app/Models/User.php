<?php

namespace App\Models;

use App\Models\Doctor;
use App\Models\Patient;
use App\Models\Appointment;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;
    use SoftDeletes;

    protected $dates = ['created_at', 'updated_at', 'deleted_at'];
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'image', 'api_token', 'type'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public static function boot()
    {
        parent::boot();

        self::deleting(function (User $user) {
            foreach ($user->appointments as $appointment) {
                $appointment->delete();
            }
        });
    }

    /**
     * Get the user appointments.
     */
    public function appointments()
    {
        if ($this->type === 'patient') {
            return $this->hasMany(Appointment::class, 'patient_id');
        }
        return $this->hasMany(Appointment::class, 'doctor_id');
    }

    /**
     * Get the user patient info.
     */
    public function patient()
    {
        return $this->hasOne(Patient::class);
    }

    /**
     * Get the user doctor info.
     */
    public function doctor()
    {
        return $this->hasOne(Doctor::class);
    }
}
