<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    static public function getSingle($id){
        return self::find($id);
    }

static public function getRecordUser()
{
    return self::select('users.*')
               ->where('is_admin', '=', 0)
               ->where('is_delete', '=', 0)
               ->orderBy('id', 'desc')
               ->paginate(20);

}
public function getProfile()
{
    if(!empty($this->profile_pic) && file_exists('upload/profile/'.$this->profile_pic))
    {
        return url('upload/profile/'.$this->profile_pic);
    }
    else
    {
        return url('assets/img/profile-img.jpg');
    }
}

}
