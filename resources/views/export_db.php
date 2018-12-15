<?php
 $export = fopen(dirname(__FILE__).'/public/export.sql','w');
 function export($sql) {
 global $export;
 fwrite($export,$sql);
 ob_flush();
 }
 function trace($msg){
 echo $msg.'</br>';
 ob_flush();
 }
 mysql_connect('127.0.0.1','web_ki','jJwZLUtFL1fR2');
 mysql_select_db('web_ki');
 mysql_query('set names utf8');

 $res=mysql_query('show tables');

 while($tbl=mysql_fetch_array($res)){
 $table=$tbl[0];
 $r=mysql_query('show create table `'
 .mysql_real_escape_string($table).'`');
 $struct=mysql_fetch_array($r);
 $sql_struct[$table]=$struct[1].';';
 }

 export('set names utf8;\n');

 foreach($sql_struct as $tbl_name=>$crt_str){
 trace('Идет экспорт '.$tbl_name);
 //export(&quot;DROP TABLE IF EXISTS `".$tbl_name."`;\n&quot;);
 export($crt_str."\n");
 export("LOCK TABLES `".$tbl_name."` WRITE \n");
 mysql_query('LOCK TABLES `'.$tbl_name.'` READ');
 $res=mysql_query('select * from `'.$tbl_name.'`');
 $insert_str='insert into `'.$tbl_name.'` values ';
 while($item=mysql_fetch_assoc($res)){
 foreach($item as $k=>$v){
 $item[$k]=mysql_real_escape_string($v);
 }
 export($insert_str.'("'.implode('","',$item).'");'."\n");
 }
 export("UNLOCK TABLES;\n");
 mysql_query('UNLOCK TABLES');
 }
 export('-- end of export');
 trace('База была успешно экспортирована');
?>
