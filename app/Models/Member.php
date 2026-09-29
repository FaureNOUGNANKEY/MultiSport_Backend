<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    protected $fillable = ['user_id','club_id','lastname','firstname','address','fatherPhone','motherPhone','fatherEmail','motherEmail','athletePhone','athleteEmail','birthday','height','weight','novice','level','previousInstructor','diseases','surgicalHistory','currentTreatment','allergy','others'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function club()
    {
        return $this->belongsTo(Club::class);
    }


    public function bureausAsPresident()
    {
        return $this->hasMany(Bureau::class, 'president');
    }

    public function bureausAsSecretary()
    {
        return $this->hasMany(Bureau::class, 'secretary');
    }

    public function bureausAsTreasurer()
    {
        return $this->hasMany(Bureau::class, 'treasurer');
    }

    public function bureausAsVicePresident1()
    {
        return $this->hasMany(Bureau::class, 'vicePresident1');
    }

    public function bureausAsVicePresident2()
    {
        return $this->hasMany(Bureau::class, 'vicePresident2');
    }

    public function bureausAsDeputySecretary()
    {
        return $this->hasMany(Bureau::class, 'deputySecretary');
    }

    public function bureausAsDeputyTreasurer()
    {
        return $this->hasMany(Bureau::class, 'deputyTreasurer');
    }

    public function bureausAsBoardMember1()
    {
        return $this->hasMany(Bureau::class, 'boardMember1');
    }

    public function bureausAsBoardMember2()
    {
        return $this->hasMany(Bureau::class, 'boardMember2');
    }
}
