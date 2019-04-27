<?php

class Database {

    private $dns;
    private $user;
    private $pass;
    private $option;
    public $db; // that connects to pdo

    public function __construct($var)
    {
        
        $this->dns = $var-> getDns();
        $this->user = $var-> getUser();
        $this->pass = $var-> getPass();
        $this->option = $var-> getOption(); 
        $this->connect();
    }
    

        private function connect()
        {
        
            // connect to the server
            $this->db = new PDO($this->dns,$this->user,$this->pass,$this->option);
            $this->db->setAttribute(PDO::ATTR_ERRMODE , PDO::ERRMODE_EXCEPTION);
            
        }
        public function add($data,$tableName){
            //$data must be an array
            $keys=array();
            $values=array(); 
       
            foreach($data as $key => $value){  
                $val="'$value'";
                array_push($keys,$key);
                array_push($values,$val);
            }
                
                $tblkeys = implode($keys , ','); // transform an array to string
                $datavalues = implode($values , ',') ;
                $stmt = $this->db->prepare("INSERT INTO $tableName ($tblkeys) VALUES($datavalues)");
                
               return $stmt->execute();

        }

        private function close(){
            $this->db->close();
        }
    
}


?>
