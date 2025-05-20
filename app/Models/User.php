<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    protected $primaryKey = 'nim_nip';
    public $incrementing = false; // karena bukan auto-increment (biasanya string)
    protected $keyType = 'string'; // tipe data primary key

    public function notaMasukPengadaan(){
        return $this->hasMany(NotaMasukPengadaan::class, "user_nim_nip", "nim_nip");
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        "nim_nip",
        "nama",
        "password",
        "jabatan_lab",
        "no_hp",
        "angkatan_asisten",
        "alamat"
    ];



    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }
}
