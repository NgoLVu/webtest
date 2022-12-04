<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use DB;

class TinTucModel extends Model
{
    use HasFactory;
    protected $table="tb_tintuc";
    public function loaitin(){
        //Tin tuc thuoc mot loai tin
        return $this->belongsTo('App\Models\LoaiTinModel','idLoaiTin','id');
    }
    public function comment(){
        return $this->hasMany('App\Models\CommentModel','idTinTuc','id');
    }
    public function getAllTin($perPage=null){

        $record= DB::table($this->table)
         ->select('tb_tintuc.*','tb_loaitin.ten as loaitin_name')
         ->join('tb_loaitin','tb_tintuc.idloaitin','=','tb_loaitin.id');
         if(!empty($perPage)){
            $record=$record->paginate($perPage);
         }else{
            $record=$record->get();
         }
        return $record;

    }
    public function AddTin($data){
        DB::insert('INSERT INTO '.$this->table.' (Tieude,TomTat,NoiDung,Hinh,idLoaiTin) VALUES (?,?,?,?,?)',$data);
       // return DB::table($this->table)->insert($data);
    }
    public function editTin($id){
        return DB::select('SELECT*FROM '.$this->table.' where id=?',[$id]);
    }
    public function updateTin($data,$id){
        // $data[]=$id;
        //  return DB::update('UPDATE '.$this->table.' SET ten=? where id=?',$data);
        return DB::table($this->table)->where('id',$id)->update($data);
    }
    public function DeleteTin($id){
      //  return DB::delete('delete from ' .$this->table.' where id = ?', [$id]);
        return DB::table($this->table)->where('id',$id)->delete();
    }
}
