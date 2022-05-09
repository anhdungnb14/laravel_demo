<?php 
if(!function_exists("vietproHelper")){
    function vietproHelper(){
        return "vietpro helper";
    }
}
if(!function_exists("showCategories")){
    function showCategories($categories, $parent, $char, $parent_id_child){
            foreach($categories as $category){
                if($parent_id_child == $category['id']){
                    $selected = 'selected';
                }else{
                    $selected = '';
                }
                if($category['parent'] == 0){
                    $disabled = ' disabled';
                }else{
                    $disabled = '';
                }
                if($category['parent'] == $parent){
                    echo "<option ". $selected.$disabled. " value='".$category['id']."'>".$char.$category['name']."</option>";
                    echo showCategories($categories, $category['id'], $char."|-- ", $parent_id_child);
                }
            }
        }
}
