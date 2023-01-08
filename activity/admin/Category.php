<?php

namespace admin;
use database\database;
class Category extends admin  {

    public function index(){
        $db=new database();
        $parametrs=$db->select('select * from category order by id desc ');
        $this->showpage("categories/index.php","Category",$parametrs,);
    }
    public function create(){
        $this->showpage("categories/create.php","Create Category");
    }
    public function store($name){
        $db=new database();
        $db->create("category",['name'],[$name['name']]);
        $this->redirect("admin/category");
    }
    public function edit($id){
        $db=new database();
        $parametrs=$db->select('select * from category where id=?',[$id])->fetch();
        $this->showpage("categories/edit.php","Edit Category",$parametrs);
    }
    public function update($request,$id){
        $db=new database();
        $db->update("category",["name"],[$request['name']],"id",$id);
        $this->redirect("admin/category");
    }
    public function delete($id){
        $db=new database();
        $db->delete("category","id",$id);
        $this->redirect("admin/category");
    }
}