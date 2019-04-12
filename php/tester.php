<?php

class tester{
    public function testEmptySixParameters($first,$second,$third,$fourth,$fifth,$six){
        if(!empty($first) && !empty($second) && !empty($third) && !empty($fourth) && !empty($fifth) && !empty($six)){
            return true;
        }else{
            return false;
        }
    }
}


/*
function Validate(array $data)
{
    foreach($data as $key => $value)
    {
        
        foreach($value as $key2 => $value2)
        {
            
            if(empty($_POST[$key]))
            {
             $this->setError($key2,$value2);   
            }
            }
        }
    }
    
}

function Query()

Validate(array(
   "username"=>array("user_err"=>"Username is required"
       "
           . "
             function checkFiveFiler(array $data,$sql)
      {
        $smt = $this->con->prepare($ql);
        foreach($data as $key => $value)
        {
            
        $smt->bindParam($key,$value);    
        
        }
        $sms->execute();
        $smt->fetch(PDO::FETCH_ASSOC);
          $count = $smt->rowCount();
          return $count;
      }
      
      checkFiveFiler(array(
          ":first"=>$first,
          ":last"=>$second,
          
      ),$ql);
 * 
 */