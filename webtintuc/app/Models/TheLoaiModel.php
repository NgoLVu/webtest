<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use DB;

class TheLoaiModel extends Model
{
    use HasFactory;
    protected $table="tb_theloai";
    public function loaitin(){
        //Lay nhieu loai tin co trong the loai : hasMany
        return $this->hasMany('App\Models\LoaiTinModel','idTheLoai','id');
    }
    public function tintuc(){
        //Lay tat ca tin co trong the loai : hasMany
        return $this->hasManyThrough('App\Models\TinTucModel','App\Models\LoaiTinModel','idTheLoai','idLoaiTin','id');
    }
    public function getAllCategory($perPage=null){
        $record= DB::table($this->table);
        if(!empty($perPage)){
            $record=$record->paginate($perPage);
         }else{
            $record=$record->get();
         }
        return $record;
    }
    public function AddCategory($data){
         DB::insert('INSERT INTO tb_theloai (ten) VALUES (?)',$data);
      //  DB::insert('INSERT INTO'.$this->table.' (name) VALUES (?)',$data);
    }
    public function editCategory($id){
        return DB::select('SELECT*FROM '.$this->table.' where id=?',[$id]);
    }
    public function updateCategory($data,$id){
        $data[]=$id;
        return DB::update('UPDATE '.$this->table.' SET ten=? where id=?',$data);
    }
    public function DeleteCategory($id){
        return DB::delete('delete from ' .$this->table.' where id = ?', [$id]);
    }
}
