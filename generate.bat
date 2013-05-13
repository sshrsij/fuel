set oil=C:\Users\Public\Documents\XAMPP\php\php.exe C:\Users\Public\Documents\XAMPP\htdocs\fuel\oil
REM;%oil% g model pkmn pid:int no:int name:varchar[50] H:int A:int B:int C:int D:int S:int Total:int type1:int type2:int skill1:int skill2:int skill3:int egg1:int egg2:int

REM;%oil% g model peronality name:varchar[50] H:int A:int B:int C:int D:int S:int
REM;%oil% g model learning no:int lv:int wayto:varchar[20] name:varchar[20]
%oil% g model ptype name:varchar[50]
%oil% refine migrate
pause
