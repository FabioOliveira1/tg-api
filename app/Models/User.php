<?php

namespace App\Models;

use App\Models\BaseModel;

class User extends BaseModel
{
    protected $table = 'Users';
    protected $primaryKey = 'User_idUsuario';

    public $fillable = [
        'User_nivelAcesso',
        'User_matricula',
        'User_senha',
        'User_nome',
        'User_email'
        // 'email_verified_at'
    ];

    public $hidden = [
        'User_senha'
    ];

    public $dates = ['created_at', 'updated_at'];

    public static function boot()
    {
        parent::boot();
    }

    public function hasRelatedRecords()
    {
        return $this->bills()->count() > 0;
    }

    public function bills()
    {
        return $this->hasMany(Bill::class, 'Cta_idUser', 'User_idUsuario');
    }
}
