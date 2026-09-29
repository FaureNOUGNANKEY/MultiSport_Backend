<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Bureau extends Model
{
    protected $fillable = [
        'user_id','club_id','league_id','federation_id',
        'startDate','endDate','president','secretary',
        'vicePresident1','vicePresident2','deputySecretary',
        'treasurer','deputyTreasurer','boardMember1','boardMember2'
    ];

    public function club()
    {
        return $this->belongsTo(Club::class);
    }

    public function league()
    {
        return $this->belongsTo(League::class);
    }

    public function federation()
    {
        return $this->belongsTo(Federation::class);
    }

    // Relations vers les membres occupant chaque rôle
    public function president() { return $this->belongsTo(Member::class, 'president'); }
    public function secretary() { return $this->belongsTo(Member::class, 'secretary'); }
    public function treasurer() { return $this->belongsTo(Member::class, 'treasurer'); }
    public function vicePresident1() { return $this->belongsTo(Member::class, 'vicePresident1'); }
    public function vicePresident2() { return $this->belongsTo(Member::class, 'vicePresident2'); }
    public function deputySecretary() { return $this->belongsTo(Member::class, 'deputySecretary'); }
    public function deputyTreasurer() { return $this->belongsTo(Member::class, 'deputyTreasurer'); }
    public function boardMember1() { return $this->belongsTo(Member::class, 'boardMember1'); }
    public function boardMember2() { return $this->belongsTo(Member::class, 'boardMember2'); }
}
