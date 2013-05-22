<?php defined('COREPATH') or exit('No direct script access allowed'); ?>

ERROR - 2013-05-22 12:14:43 --> 1064 - You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near 'from pkmns 
	    left join Abilities as a1 on a1.id = pkmns.skill1 
	    left ' at line 5 [ select 
	    a1.id as a1id, a1.name as a1name, a1.detail as a1text,
	    a2.id as a2id, a2.name as a2name, a2.detail as a2text,	    
	    a3.id as a3id, a3.name as a3name, a3.detail as a3text,	    
	    from pkmns 
	    left join Abilities as a1 on a1.id = pkmns.skill1 
	    left join Abilities as a2 on a2.id = pkmns.skill2 
	    left join Abilities as a3 on a3.id = pkmns.skill3 	    
	    where pkmns.id = '11' ] in C:\Users\hishita\Documents\xampp\htdocs\fuel\fuel\core\classes\database\mysql\connection.php on line 235
ERROR - 2013-05-22 12:16:06 --> 1064 - You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near 'from pkmns 
	    left join Abilities as a1 on a1.id = pkmns.skill1 
	    left ' at line 5 [ select 
	    a1.id as a1id, a1.name as a1name, a1.detail as a1text,
	    a2.id as a2id, a2.name as a2name, a2.detail as a2text,	    
	    a3.id as a3id, a3.name as a3name, a3.detail as a3text,	    
	    from pkmns 
	    left join Abilities as a1 on a1.id = pkmns.skill1 
	    left join Abilities as a2 on a2.id = pkmns.skill2 
	    left join Abilities as a3 on a3.id = pkmns.skill3 	    
	    where pkmns.id = '11' ] in C:\Users\hishita\Documents\xampp\htdocs\fuel\fuel\core\classes\database\mysql\connection.php on line 235
ERROR - 2013-05-22 12:17:42 --> Error - Cannot pass parameter 2 by reference in C:\Users\hishita\Documents\xampp\htdocs\fuel\fuel\app\classes\controller\api.php on line 17
ERROR - 2013-05-22 12:17:58 --> Error - Cannot pass parameter 2 by reference in C:\Users\hishita\Documents\xampp\htdocs\fuel\fuel\app\classes\controller\api.php on line 17
ERROR - 2013-05-22 13:28:00 --> 8 - Undefined index: a1id in C:\Users\hishita\Documents\xampp\htdocs\fuel\fuel\app\classes\controller\api.php on line 21
