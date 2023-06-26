<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Channel;

class Discussion extends Model
{
    use HasFactory;
    protected $fillable = ['title','content','slug','channel_id','user_id'];

    public function channel()
        {
            return $this->belongsTo(Channel::class);
        }
}
