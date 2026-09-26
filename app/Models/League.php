<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class League extends Model
{
    protected $fillable = ['user_id','name','foundedOn','status','receipt','registrationNumber','headOffice','phone','address'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
