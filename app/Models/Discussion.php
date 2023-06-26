<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Channel;
use App\Models\User;

class Discussion extends Model
{
    use HasFactory;
    protected $fillable = ['title','content','slug','channel_id','user_id'];

    public function channel()
        {
            return $this->belongsTo(Channel::class);
        }

    public function user()
        {
            return $this->belongsTo(User::class);
        } 
     
    public function reply()
        {
            return $this->hasMany(Reply::class);
        }     
     
    public function getRouteKeyName()
        {
            return 'slug';
        }    

}
