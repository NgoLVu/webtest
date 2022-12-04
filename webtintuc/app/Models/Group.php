<?php

namespace App\Models;
use DB;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
    use HasFactory;
    protected $table='groups';
    public function getGroup(){
        $users=DB::table($this->table)
      //  ->orderBy('Ten','asc')
        ->get();
        return $users;
    }
}
