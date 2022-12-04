<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CommentModel extends Model
{
    use HasFactory;
    protected $table="tb_comment";
    public function tintuc(){
        return $this->belongsTo('App\Models\TinTucModel','idTinTuc','id');
    }
    public function user(){
        return $this->belongsTo('App\Models\UserModel','idUser','id');
    }
}
