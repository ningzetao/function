<?php

function my_dir($dir){
    $files=array();
    if(@$handle=opendir($dir)){//注意这里要加一个@，不然会有warning错误提示：）
        while(($file=readdir($handle))!==false){
            if($file!=".." && $file!="."){//排除根目录；
                if(is_dir($dir."/".$file)){//如果是子文件夹，就进行递归
                    $files[$file]=my_dir($dir."/".$file);
                }else{//不然就将文件的名字存入数组；
                    $files[]=$file;
                }
 
            }
        }
        closedir($handle);
        return $files;
    }
 }
//以下是测试
 $q_array=my_dir('E:/115/');
 var_dump($q_array);
?>
