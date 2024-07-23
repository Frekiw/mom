<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Meeting extends Model
{
    use HasFactory;

    protected $primaryKey = 'id_meeting';
    protected $fillable = [
        'stmeeting_id', 'id_mt', 'forward_id','owner_id','title','date','notes','pm_sign','sign_date','client_sign','narasi','password'];

    public function stmeeting()
    {
        return $this->belongsTo(Stmeeting::class, 'stmeeting_id');
    }
        
    public function user()
    {
        return $this->belongsTo(User::class,'owner_id','id');
    }

    public function owner_id()
    {
        return $this->belongsTo(User::class,'owner_id','id');
    }

    public function forward_id()
    {
        return $this->belongsTo(User::class,'forward_id','id');
    }

    public function stmeeting_id()
    {
        return $this->belongsTo(Stmeeting::class,'stmeeting_id','id_stmeeting');
    }
    
    public function getCreatedAtAttribute($value)
    {
        return Carbon::parse($value)->timestamp;
    }
    public function getUpdatedAtAttribute($value)
    {
        return Carbon::parse($value)->timestamp;
    }
    
    public function forwardUser()
    {
        return $this->belongsTo(User::class, 'forward_id');
    }

}
