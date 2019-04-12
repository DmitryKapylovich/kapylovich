<?php

class file{
private $resFile;   
       
    function __construct($pathFile){
        
        $this->resFile = fopen($pathFile, 'a');
        
    }
    function write($str){
        
        
        fwrite($this->resFile, $str); 
            
    
    }
    function __destruct(){
        fclose($this->resFile);
        
    }
}

$write = new file("file.txt");
$write->write("1231");
unset($write);

?>