set oil=C:\Users\hishita\Documents\xampp\php\php.exe C:\Users\hishita\Documents\xampp\htdocs\fuel\oil

%oil% g model skill name:varchar[20] power:int hit:int pp:int ptype:int skilltype:varchar[10] touch:int range:varchar[50] effect:int memo:varchar[100]
%oil% refine migrate
pause

REM;74,ゆめくい,100,100,15,11,特殊        ,1,通常        ,8,ダメージ分回復（1/2）