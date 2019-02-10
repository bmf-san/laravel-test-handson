<?php

namespace App;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'body', 'user_id',
    ];
    
    
    /**
     * Get a user
     * @return User
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
