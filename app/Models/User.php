<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
//use App\Followable;
use App\Http\Controllers\ProfilesController;


class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    /*protected $fillable = [
        'username',
        'name',
        'email',
        'password',
    ];*/
    protected $guarded = [];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function setPasswordAttribute($value){
        $this->attributes['password'] = bcrypt($value);
    }

    public function getAvatarAttribute($value){

        if(isset($value)) {

            return asset('storage/' . $value );

        } else {

            return asset('images/other.jpg');
        }
    }


    public function following(User $user)
    {
       // return $this->follows->contains($user);
        return $this->follows()->where('following_user_id',$user->id)->exists();
    }

    public function follows()
    {
        return $this->belongsToMany(User::class, 'follows', 'user_id', 'following_user_id');
    }

    public function unfollows(User $user)
    {
        return $this->follows()->detach($user);
    }

    public function ToggleFollow(User $user){

        return $this->follows()->toggle($user);

    }

    public function follow(User $user)
    {
        return $this->follows()->save($user);
    }

    public function Timeline(){

        $ids = $this->follows()->pluck('id');
        $ids->push($this->id);

        return Tweet::whereIn('User_id',$ids)->latest()->paginate();
    }

    public function Tweets(){
        return $this->hasMany(Tweet::class);
    }

    public function path($append = ''){

        $path=route('profile',$this->username);

        return $append ? "{$path}/{$append}":$path;
    }


}

