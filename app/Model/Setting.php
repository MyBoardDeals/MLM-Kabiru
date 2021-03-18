<?php
App::uses('Model', 'Model');

class Setting extends Model {
public $name = 'Setting';


function getLogoFile($filename_img, $create = null, $chmod = null){
return new File(WWW_ROOT . 'files' . DS . 'logo' . DS . $filename_img , $create, $chmod);
}
	 
}
