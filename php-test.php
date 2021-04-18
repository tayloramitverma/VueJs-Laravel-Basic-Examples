<?php
// Your code here!

$number = 200;
testNumb($number);

function testNumb($number) {

    for($i=1;$i<=$number;$i++){
            
        $str = '';
        
        if ($i % 4 == 0) {
            $str = 'Amit';
        }
            
        if ($i % 7 == 0) {
            $str .= ' Verma';   
        }
            
        if(empty($str)) {
            $str = $i;
        }

        if ($i % 100 == 0) {
            $str .= '\n';   
        }

        echo $str.',';
    }
    
}

?>
