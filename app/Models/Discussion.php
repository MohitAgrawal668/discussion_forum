<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Channel;
use App\Models\User;

class Discussion extends Model
{
    use HasFactory;
    protected $fillable = ['title','content','slug','channel_id','user_id','reply_id'];

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
        
    public function bestOneReply()
        {
            return $this->belongsTo(Reply::class,'reply_id');
        }    
     
    public function getRouteKeyName()
        {
            return 'slug';
        }    
    
    public function scopeFilterByChannel($builder)
        {
            if(request()->query('channel'))
                {
                     $channel = Channel::where('slug',request()->query('channel'))->first();
                     if($channel)
                        {
                            return $builder->where('channel_id',$channel->id);
                        }   
                    return $builder;    
                }
            return $builder;        
        }
}
