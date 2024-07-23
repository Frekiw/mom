<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Stmeeting extends Model
{
    use HasFactory;

    protected $primaryKey = 'id_stmeeting';
    protected $fillable = [
        'name'];

    public function meetings()
    {
        return $this->hasMany(Meeting::class, 'stmeeting_id');
    }
    
    public function getCreatedAtAttribute($value)
    {
        return Carbon::parse($value)->timestamp;
    }
    public function getUpdatedAtAttribute($value)
    {
        return Carbon::parse($value)->timestamp;
    }

}
