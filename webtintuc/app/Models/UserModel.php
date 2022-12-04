<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use DB;

class UserModel extends Model
{
    use HasFactory;
    protected $table='tb_user';
    public function comment(){
        return $this->hasMany('App\Models\CommentModel','idUser','id');
    }
    public function getAllUsers($perPage=null){

        $record= DB::table($this->table)
         ->select('tb_user.*','groups.ten as group_name')
         ->join('groups','tb_user.group_id','=','groups.id');
         if(!empty($perPage)){
            $record=$record->paginate($perPage);
         }else{
            $record=$record->get();
         }
        return $record;

    }
    public function AddUser($data){
        DB::insert('INSERT INTO '.$this->table.' (name,email,group_id,password) VALUES (?,?,?,?)',$data);
       // return DB::table($this->table)->insert($data);
    }
    public function editUser($id){
        return DB::select('SELECT*FROM '.$this->table.' where id=?',[$id]);
    }
    public function updateUser($data,$id){
        // $data[]=$id;
        //  return DB::update('UPDATE '.$this->table.' SET ten=? where id=?',$data);
        return DB::table($this->table)->where('id',$id)->update($data);
    }
    public function DeleteUser($id){
      //  return DB::delete('delete from ' .$this->table.' where id = ?', [$id]);
        return DB::table($this->table)->where('id',$id)->delete();
    }

}
