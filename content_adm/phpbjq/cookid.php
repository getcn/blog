<?php
function rand_zifu($what,$number){ 
$string=''; 
for($i = 1; $i <= $number; $i++){ 
//混合 
$panduan=1; 
if($what == 3){ 
if(rand(1,2)==1){ 
$what=1; 
}else{ 
$what=2; 
} 
$panduan=2; 
} 

//数字 
if($what==1){ 
$string.=rand(0,9); 
}elseif($what==2){ 
//字母 
$rand=rand(0,24); 
$b='a'; 
for($a =0;$a <=$rand;$a++){ 
$b++; 
} 
$string.=$b; 
} 
if($panduan==2)$what=3; 
} 
return $string; 
} 
echo rand_zifu(3,16); 
?>