<?php


namespace admin;


use database\database;

class user extends admin
{
public function index(){
$db=new database();
$parametrs=$db->select("select * from users")->fetchAll();
$this->showpage("users/index.php","users",$parametrs);
}
    public function set_user($id){

        $db=new database();
        $db->update("users",['permission'],['false'],'id',$id);
        $this->redirect("admin/user");
    }
    public function set_admin($id){
        $db=new database();
        $db->update("users",['permission'],['1'],'id',$id);
        $this->redirect("admin/user");
    }
    public function edit($id){
        $db=new database();
        $parametrs=$db->select('select * from users where id=?',[$id])->fetch();
        $this->showpage("users/edit.php","Edit User ".$parametrs['username'],$parametrs);
    }
    public function update($request,$id){
        $db=new database();
        $request['password']=password_hash($request['password'],PASSWORD_DEFAULT);
        $db->update("users",array_keys($request),$request,"id",$id);
        $this->redirect("admin/user");
    }
    public function delete($id){
        $db=new database();
        $db->delete("users","id",$id);
        $this->redirect("admin/user");
    }
}