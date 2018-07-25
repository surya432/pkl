<?php 
namespace App\Http\Controllers;

use PHPHtmlParser\Dom;
trait DOMActions {

    public function dom_nisn($nisn){
        $html= new Dom();
        $parse_html= $html->loadFromFile('http://nisn.data.kemdikbud.go.id/page/data?nisn='.$nisn);
        $data = array();
        $data["nisn"]= $parse_html->find('span[id=contentCenter_lRes1NISN]')->innerhtml;
        $data["nama"]= $parse_html->find('span[id=contentCenter_lRes1Nama]')->innerhtml;
        $data["jenis_kelamin"]= $parse_html->find('span[id=contentCenter_lRes1Kelamin]')->innerhtml;
        $data["tmpat_lahir"]= $parse_html->find('span[id=contentCenter_lRes1Tmptlahir]')->innerhtml;
        $data["tgl_lahir"]= $parse_html->find('span[id=contentCenter_lRes1TglLahir]')->innerhtml;
        if(is_null($data["nisn"])){
            return $data["nisn"]= false;
        }
        return $data;
    }
    
}
