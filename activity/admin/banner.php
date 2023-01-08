<?php


namespace admin;


use database\database;

class banner extends admin
{

    public function index(){
        $db=new database();
        $parametrs=$db->select('select * from banner order by id desc ');
        $this->showpage("banners/index.php","banner",$parametrs,);
    }
    public function create(){
        $this->showpage("banners/create.php","Create banner");
    }
    public function store($request){
        if (isset($request['image'])) {
            $request['image'] = $this->saveimage($request['image'], "banner-image");
            if ($request['image']){
                $db=new database();
                $db->create("banner",array_keys($request),$request);

            }
        }
        $this->redirect("admin/banner");
    }
    public function edit($id){
        $db=new database();
        $parametrs=$db->select('select * from banner where id=?',[$id])->fetch();
        $this->showpage("banners/edit.php","Edit banner",$parametrs);
    }
    public function update($request,$id){
        $db=new database();
        if ($request['image']['name']){
            $imagePath=$db->select('select image from banner where id=?',[$id])->fetch()['image'];
            $this->deleteimage($imagePath);
            $request['image']=$this->saveimage($request['image'],"banner-image");
            if ($request['image']){
                $db->update("banner",array_keys($request),$request,"id",$id);
            }
        }else{
            unset($request['image']);
            $db->update("banner",array_keys($request),$request,"id",$id);
        }
        $this->redirect("admin/banner");
    }
    public function delete($id){
        $db=new database();
        $image=$db->select("select image from banner where id=?",[$id])->fetch();
        $this->deleteimage($image['image']);
        $db->delete("banner","id",$id);
        $this->redirect("admin/banner");
    }

}