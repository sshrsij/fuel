set oil=C:\Users\Public\Documents\XAMPP\php\php.exe C:\Users\Public\Documents\XAMPP\htdocs\fuel\oil

REM ; %oil% g model mnst no:int name:varchar[50] H:int A:int B:int C:int D:int S:int
REM ; %oil% refine migrate -all
%oil% g controller mnst list detail
pause