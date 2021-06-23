<?php 

use App\Models\action;

function checkActive($id,$type,$userid,$shtype) {
    $action = action::where(['owner'=>$userid,'show'=>$id,'action_type'=>$type,'show_type'=>$shtype])->get()->first();
    if($action) {
        echo 'active';
    }
}