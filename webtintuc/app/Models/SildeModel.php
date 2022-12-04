<?php

namespace App\Models;
use DB;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SildeModel extends Model
{
    use HasFactory;
    protected $table="tb_slide";
    public function getAllSilde($perPage=null){
        $record= DB::table($this->table);
        if(!empty($perPage)){
            $record=$record->paginate($perPage);
         }else{
            $record=$record->get();
         }
        return $record;
    }
    public function AddSlide($data){
         DB::insert('INSERT INTO tb_slide (ten,HinhAnh,NoiDung,link) VALUES (?,?,?,?)',$data);
      //  DB::insert('INSERT INTO'.$this->table.' (ten) VALUES (?)',$data);
    }
    public function editSlide($id){
        return DB::select('SELECT*FROM '.$this->table.' where id=?',[$id]);
    }
    public function updateSlide($data,$id){
        return DB::table($this->table)->where('id',$id)->update($data);
    }
    public function DeleteSlide($id){
        return DB::delete('delete from ' .$this->table.' where id = ?', [$id]);
    }
}
