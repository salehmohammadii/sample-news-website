<?php


namespace admin;

use database\database;
class menue extends admin
{
    public function index(){
        $db=new database();
        $parametrs=$db->select("select * from menue")->fetchAll();
        $this->showpage("menues/index.php","menues",$parametrs);
    }
    public function create(){
        $db=new database();
        $parametrs=$db->select("select * from menue order by id");
        $this->showpage("menues/create.php","Create menue",$parametrs);

    }
    public function store($request){
      $db=new database();
      $db->create("menue",array_keys($request),$request);
      $this->redirect("admin/menue");
    }

    public function delete($id){
        $db=new database();
        $db->delete("menue","id",$id);
        $this->redirect("admin/menue");
    }
    public function edit($id){
        $db=new database();
        $menues=$db->select('select * from menue');
        $menue=$db->select('select * from menue where id=?',[$id])->fetch();
        $parametrs=array_merge(["menues"=>$menues],["menue"=>$menue]);
        $this->showpage("menues/edit.php","Edit menue",$parametrs);
    }
    public function update($request,$id){
        $db=new database();

                $db->update("menue",array_keys($request),$request,"id",$id);
        $this->redirect("admin/menue");
    }
}