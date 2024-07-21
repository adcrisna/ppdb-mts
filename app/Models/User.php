<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    public function Siswa()
    {
        return $this->belongsTo(Siswa::class, 'id', 'user_id');
    }
    public function Berkas()
    {
        return $this->belongsTo(Berkas::class, 'id', 'user_id');
    }
    public function Hasil()
    {
        return $this->belongsTo(Hasil::class, 'id', 'user_id');
    }
    public function Nilai()
    {
        return $this->belongsTo(Nilai::class, 'id', 'user_id');
    }
    public function Sekolah()
    {
        return $this->belongsTo(Sekolah::class, 'id', 'user_id');
    }
    public function OrangTua()
    {
        return $this->belongsTo(OrangTua::class, 'id', 'user_id');
    }
}
