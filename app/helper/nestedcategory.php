<?php
use Illuminate\Support\Facades\DB;


 function topnavbar(){

    $result['main_cat']=DB::table('categories')->where('status','1')->where('parent_category_id','0')->get();
           
    foreach( $result['main_cat'] as $main_list){
     $result['sub_cat'][$main_list->id]=DB::table('categories')->where('parent_category_id',$main_list->id)->get();
    }


    return $result;
}

 function prnt($data){
echo "<pre>";
print_r($data);
die;
}





?>