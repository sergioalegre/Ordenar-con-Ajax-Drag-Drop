<?php 

/*TABLE USUARIOS

CREATE TABLE `articulos` (
`id_articulo` INT NOT NULL AUTO_INCREMENT PRIMARY KEY ,
`nombre_articulo` VARCHAR( 50 ) NOT NULL ,
`orden_articulo` INT NOT NULL
) ENGINE = MYISAM ;

*/

$cn = mysql_connect("localhost","root","");
mysql_select_db("ordenarconajax", $cn);

?>