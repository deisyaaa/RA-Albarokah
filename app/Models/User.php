<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Modules\Perpustakaan\Entities\Member;
use Modules\PPDB\Entities\BerkasMurid;
use Modules\PPDB\Entities\DataOrangTua;
use Modules\SPP\Entities\BankAccount;
use Modules\SPP\Entities\PaymentSpp;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use HasFactory, Notifiable, HasRoles;

    protected $fillable = [
        'name', 'username', 'role', 'status', 'foto_profile', 'email', 'password', 'kelas_id',
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function userDetail()
    {
        return $this->hasOne(UsersDetail::class, 'user_id', 'id');
    }

    public function muridDetail()
    {
        return $this->hasOne(dataMurid::class, 'user_id', 'id');
    }

    public function dataOrtu()
    {
        return $this->hasOne(DataOrangTua::class, 'user_id', 'id');
    }

    public function berkas()
    {
        return $this->hasOne(BerkasMurid::class, 'user_id', 'id');
    }

    public function member()
    {
        return $this->hasOne(Member::class, 'user_id', 'id');
    }

    public function payment()
    {
        return $this->hasOne(PaymentSpp::class, 'user_id', 'id');
    }

    public function bank()
    {
        return $this->hasOne(BankAccount::class, 'user_id', 'id');
    }

    public function banks()
    {
        return $this->hasMany(BankAccount::class, 'user_id', 'id');
    }

    public function setting()
    {
        return $this->hasOne(Setting::class, 'user_id', 'id');
    }

    public function kelas()
    {
        return $this->belongsTo(Kelas::class, 'kelas_id');
    }
}
