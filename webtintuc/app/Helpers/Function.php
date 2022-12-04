<?php
use App\Models\Group;
use App\Models\TheLoaiModel;
use App\models\LoaiTinModel;
function getAllGroup(){
    $Group= new Group;
    return $Group->getGroup();
}
function getAllTheLoai(){
    $Theloai=new TheLoaiModel;
    return $Theloai->getAllCategory();
}
function getAllLoaitin(){
    $loaitin=new LoaiTinModel;
    return $loaitin->getAllLoaiTin();

}
?>
