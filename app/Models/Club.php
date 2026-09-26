<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Club extends Model
{
    protected $fillable = ['user_id','name','foundedOn','status','receipt','registrationNumber','headOffice','founderLastname','founderFirstname','phone','address'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
