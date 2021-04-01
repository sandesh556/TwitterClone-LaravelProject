<?php

namespace App\Models;

use App\Likeable;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;



use App\Like;


class Tweet extends Model
{
    use HasFactory, Likeable;
    protected $guarded=[];


    public function User(){

        return $this->belongsTo(User::class);
    }

}
