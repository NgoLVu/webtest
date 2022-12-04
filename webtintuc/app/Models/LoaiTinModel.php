<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use DB;

class LoaiTinModel extends Model
{
    use HasFactory;
    protected $table="tb_loaitin";
    public function theloai(){
        return $this->belongsTO('App\Models\TheLoaiModel','idTheLoai','id');
    }
    public function tintuc(){
        return $this->hasMany('App\Models\TinTucModel','idLoaiTin','id');
    }
    public function getAllLoaiTin($perPage=null){
        $record=DB::table($this->table)
        ->select('tb_loaitin.*','tb_theloai.ten as theloai_name')
        ->join('tb_theloai','tb_loaitin.idTheLoai','=','tb_theloai.id');
        if(!empty($perPage)){
            $record=$record->paginate($perPage);
         }else{
            $record=$record->get();
         }
        return $record;
    }
    public function AddLoaiTin($data){
        DB::insert('INSERT INTO '.$this->table.' (idTheLoai,ten) VALUES (?,?)',$data);
    }
    public function editLoaiTin($id){
        return DB::select('SELECT*FROM '.$this->table.' where id=?',[$id]);
    }
    public function updateLoaiTin($data,$id){
        // $data[]=$id;
        //  return DB::update('UPDATE '.$this->table.' SET ten=? where id=?',$data);
        return DB::table($this->table)->where('id',$id)->update($data);
    }
    public function DeleteLoaiTin($id){
      //  return DB::delete('delete from ' .$this->table.' where id = ?', [$id]);
        return DB::table($this->table)->where('id',$id)->delete();
    }
}
