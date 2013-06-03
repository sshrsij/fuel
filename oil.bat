set oil=C:\Users\hishita\Documents\xampp\php\php.exe C:\Users\hishita\Documents\xampp\htdocs\fuel\oil

REM;%oil% g model skill name:varchar[20] power:int hit:int pp:int ptype:int skilltype:varchar[10] touch:int range:varchar[50] effect:int memo:varchar[100]
REM;%oil% refine migrate

%oil% g controller mnst editability status list search --with-viewmodel
pause

