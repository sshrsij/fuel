<?php defined('COREPATH') or exit('No direct script access allowed'); ?>

ERROR - 2013-05-21 18:02:20 --> Error - Migration "C:\Users\hishita\Documents\xampp\htdocs\fuel\fuel\app\migrations/007_create_personalities.php" does not contain expected class "Fuel\Migrations\Create_personalities" in C:\Users\hishita\Documents\xampp\htdocs\fuel\fuel\core\classes\migrate.php on line 448
ERROR - 2013-05-21 18:02:51 --> Error - Migration "C:\Users\hishita\Documents\xampp\htdocs\fuel\fuel\app\migrations/007_create_personalities.php" does not contain expected class "Fuel\Migrations\Create_personalities" in C:\Users\hishita\Documents\xampp\htdocs\fuel\fuel\core\classes\migrate.php on line 448
ERROR - 2013-05-21 18:03:35 --> Error - Migration "C:\Users\hishita\Documents\xampp\htdocs\fuel\fuel\app\migrations/007_create_personalities.php" does not contain expected class "Fuel\Migrations\Create_personalities" in C:\Users\hishita\Documents\xampp\htdocs\fuel\fuel\core\classes\migrate.php on line 448
ERROR - 2013-05-21 18:04:14 --> Error - Migration "C:\Users\hishita\Documents\xampp\htdocs\fuel\fuel\app\migrations/007_create_personalities.php" does not contain expected class "Fuel\Migrations\Create_personalities" in C:\Users\hishita\Documents\xampp\htdocs\fuel\fuel\core\classes\migrate.php on line 448
ERROR - 2013-05-21 18:29:52 --> 1064 - You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near 'no='3'' at line 13 [ select pk.no,pk.name,
	    pk.H,pk.A,pk.B,pk.C,pk.D,pk.S,
	    p1.name as type1, p2.name as type2, 
	    a1.name as ability1, a2.name as ability2, a3.name as ability3, 
	    e1.name as egg1, e2.name as egg2 
	    from pkmns as pk 
	    left join abilities as a1 on a1.id = pk.skill1 
	    left join abilities as a2 on a2.id = pk.skill2 
	    left join abilities as a3 on a3.id = pk.skill3 
	    left join eggs as e1 on e1.id = pk.egg1 
	    left join eggs as e2 on e2.id = pk.egg2 
	    left join ptypes as p1 on p1.id = pk.type1 
	    left join ptypes as p2 on p2.id = pk.type2where no='3' ] in C:\Users\hishita\Documents\xampp\htdocs\fuel\fuel\core\classes\database\mysql\connection.php on line 235
