 <?php 
App::uses('AppHelper', 'View/Helper');

class TreeHelper extends Helper {
   var $tab = " ";  
   var $helpers = array('Html'); 
  
  
  function tree_element($data,$level) {
    $tabs = "\n" . str_repeat($this->tab, $level * 2);
    $li_tabs = $tabs . $this->tab;    
    $output = $tabs. "<ol>";
    foreach ($data as $key=>$val){
      $output .= $li_tabs . "<li>".$val['User']['first_name'].' '.$val['User']['middle_name'].' '.$val['User']['last_name'];
      if(isset($val['children'][0])){
        $output .= $this->tree_element($val['children'],$level+1);
        $output .= $li_tabs . "</li>";
      }
      else
      {
        $output .= "</li>";
      }
    }
    $output .= $tabs . "</ol>";
    
    return $output;
  } 
	
	
}
?> 