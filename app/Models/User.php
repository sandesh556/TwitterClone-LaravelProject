<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
//use App\Followable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

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


    public function getAvatarAttribute(){
        return "https://i.pravatar.cc/400?u=". $this->email;
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
        if($this->following($user)){
            return $this->unfollows($user);
        }
        else{
            return $this->follow($user);
        }

    }

    public function follow(User $user)
    {
        return $this->follows()->save($user);
    }

    public function Timeline(){

        $ids = $this->follows()->pluck('id');
        $ids->push($this->id);

        return Tweet::whereIn('User_id',$ids)->latest()->get();
    }

    public function Tweets(){
        return $this->hasMany(Tweet::class);
    }


}

