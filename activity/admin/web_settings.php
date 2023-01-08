<?php

namespace admin;
use database\database;
class web_settings extends admin  {

    public function index(){
        $db=new database();
        $parametrs=$db->select('select * from settings order by id desc ')->fetch();
        $this->showpage("web-settings/index.php","Web settings",$parametrs,);
    }

    public function edit(){
        $db=new database();
        $parametrs=$db->select('select * from settings')->fetch();
        $this->showpage("web-settings/edit.php","Edit Settings",$parametrs);
    }
    public function update($request){
        $db=new database();
        $settings=$db->select('select * from settings')->fetch();
        if (empty($settings)){
            if ($request['icon']['tmp_name']!=''){
                $request['icon']=$this->saveimage($request['icon'],"settings");
            }else{
                unset($request['icon']);
            }
            if ($request['logo']['tmp_name']!=''){
                $request['logo']=$this->saveimage($request['logo'],"settings");
            }else{
                unset($request['logo']);
            }
            $db->create("settings",array_keys($request),$request);
        }else{
                if ($request['icon']['tmp_name']!='' ){
                    $this->deleteimage($settings['icon']);
                    $request['icon']=$this->saveimage($request['icon'],"settings");
                }else{
                    unset($request['icon']);
                }
                if ($request['logo']['tmp_name']!=''){
                    $this->deleteimage($settings['logo']);
                    $request['logo']=$this->saveimage($request['logo'],"settings");
                }else{
                    unset($request['logo']);
                }
            $db->update("settings",array_keys($request),$request);
        }
        $this->redirect("admin\web_settings");
    }
}