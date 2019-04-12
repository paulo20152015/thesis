<?php

class forms{
    //username field
    public function inputUsername(){
        $value = '<input type="text" class="form-control" placeholder="Enter your username"'
                . ' name="username" id="username">';
        return $value;
    }
    //password field
     public function inputPassword($name,$id){
        $value = "<input type='password' class='form-control' placeholder='Enter your password'"
                . " name='$name' id='$id'>";
        return $value;
    }
    //submit button
    public function inputSubmit($id,$name,$text){
        $value = "<button type='submit' id='$id' class='btn btn-success btn-md' name='$name'>"
                . " <span class='glyphicon glyphicon-send'  ></span> $text </button>";
        return $value;
    }
    //close modal
    
    public function modalClose(){
        $value = '<a class="btn btn-primary" data-dismiss="modal">'
                . '<span class="glyphicon glyphicon-remove-sign"> </span> Close</a>';
        return $value;
    }
    //student  lrn 
      
    
     public function inputGender($text,$name){
        $value  = "<div class='form-group'>"
		."<label class='control-label col-lg-6'>$text : </label>"
                ."<select name='$name' id='$name' class='form-control' required><option value=''></option>"
                . "<option value='Male'>Male</option>"
                . "<option value='female'>Female</option></select>"
                 ."  <span class='help-block'></span>"
           ."  </div>";
        return $value;
    }
    
    public function inputField($type,$text,$name){
    $value  = "<div class='form-group'>"
		."<label class='control-label'>$text : </label>"
                ."<input type='$type' class='form-control' placeholder='Enter $text' name='$name' id='$name' required>"
                ."<span class='help-block'></span>"
           ."  </div>";
    return $value;
    }
    public function inputFieldL($type,$text,$name){
    $value  = "<div class='form-group'>"
		."<label class='control-label'>$text : </label>"
                ."<input type='$type' class='form-control' maxlength='30' placeholder='Enter $text' name='$name' id='$name' required>"
                ."<span class='help-block'></span>"
           ."  </div>";
    return $value;
    }
    //hidden value
    public function hiddenInput($v,$n){
        $val = "<input type='hidden' value='$v' name='$n'>";
        return $val;
    }
    public function submitButton($title){
        $val = "<button class=' btn-success form-control' type='submit' >$title</button>";
        return $val;
    }
    
    public function inputFieldSet($type,$text,$name,$val){
    $value  = "<div class='form-group'>"
		."<label class='control-label'>$text : </label>"
		."<div class='col-lg-12' id='$name'>"
                  ."<input type='$type' class='form-control' placeholder='Enter $text' name='$name' id='$name' value='$val' required>"
                  ."  <span class='help-block'></span>"
		."</div>"
           ."  </div>";
    return $value;
    }
    public function inputFieldSetL($type,$text,$name,$val){
    $value  = "<div class='form-group'>"
		."<label class='control-label'>$text : </label>"
		."<div class='col-lg-12' id='$name'>"
                  ."<input maxlength='70' type='$type' class='form-control' placeholder='Enter $text' name='$name' id='$name' value='$val' required>"
                  ."  <span class='help-block'></span>"
		."</div>"
           ."  </div>";
    return $value;
    }
    public function modalFooter($id,$text,$mes){
        $value =  "<div id='$mes'>"
                 ."<hr>"
               ."</div>"
                ."</div>"
                   ."<div class='modal-footer'>"
            ."<button type='button' class='btn btn-danger' data-dismiss='modal'>Close</button>"
            ."<button type='button' class='btn btn-success' id='$id'><i class='fa fa-paper-plane'></i>$text</button>"
            ."</form>"
                       ."</div>"
                      ."</div>"
                  ."</div>"
             ." </div>";
        return $value;
    }
    
    public function modalHeader($id,$method,$idForm,$text){
        $value =  "<div class='modal fade' id='$id' tabindex='-1' role='dialog' aria-labelledby='exampleModalLabel' aria-hidden='true'>"
                      ."  <div class='modal-dialog' role='document'>"
                         ." <div class='modal-content'>"
                             ." <div class='modal-header'>"
                                ."<form method ='$method' id='$idForm'>"
                                         ." <h3 class='modal-title' id='exampleModalLabel'>$text</h3> </div>"                 
                                 ."<div class='modal-body'>";
                return $value;
    }
    //tables
    public function tableHeader($text,$id){
        $table =  "<div class='col-lg-12'>"
          ."<div class='card mb-3'>"
            ."<div class='card-header'>"
              ."<i class='fa fa-table'> </i>"
                ." $text "
            ."</div>"
            ."<div class='card-body'>"
              ."<div class='table-responsive'>"
                ."<table class='table table-bordered' width='100%' id='$id' cellspacing='0'>";
        return $table;
    }
    public function tableFooter(){
        $table = "</table>"
              ."</div>"
            ."</div>"
            ."<div class='card-footer small text-muted'>"
            ."</div>"
          ."</div>"
        ."</div>";
        return $table;
    }
    public function tdButtonModal($aClass,$iClass,$id,$title){
        $val = "<a class='$aClass' href='#' data-toggle='modal' data-target='$id'>"
                      ."<i class='$iClass'></i>"
                      ."<span class='nav-link-text'>"
                      ."$title"
                      ."</span>"
                      ."</a>";
        return $val;
    }
    public function plainModalFooter(){
          $val = " </div>"
                ."<div class='modal-footer'>"
                 ."</div>"
               ."</div>"
            ."</div>"
          ."</div>";
          return $val;
    }
    public function plainModalHeader($id,$title){
        $val =       "<div class='modal fade' id='$id' tabindex='-1' role='dialog' aria-labelledby='exampleModalLabel' aria-hidden='true'>"
                          ."<div class='modal-dialog' role='document'>"
                            ."<div class='modal-content'>"
                              ."<div class='modal-header'>"
                                ."<h5 class='modal-title' id='exampleModalLabel'>$title : </h5>"
                                ."<button type='button' class='close' data-dismiss='modal' aria-label='Close'>"
                                  ."<span aria-hidden='true'>&times;</span>"
                                ."</button>"
                              ."</div>"
                        ."<div class='modal-body'>";
            return $val;
    }
    
    //session login token
    public function getToken(){
        if(!isset($_SESSION['token'])){
            $_SESSION['token'] = md5(uniqid());
        }
    }
    //token
    public function tokenField(){
        $token  = $_SESSION['token'];
        $value = "<input type='hidden' value='$token' name='token' >";
        return $value;
    }
    //check 
    public function checkToken($token){
        if($token !== $_SESSION['token']){
            return false;
        }else{
            return false;
        }
    }
    
    //triggerform
     public function triggerField($name){
        $value = "<input type='hidden' value='$name' name='$name' >";
        return $value;
     }
     //cleaner
    public function e($string) {
        $string = str_replace(' ', '-', $string); // Replaces all spaces with hyphens.
        $string = preg_replace('/[^A-Za-z0-9\-]/', '', $string); // Removes special chars.

        return preg_replace('/-+/', '-', $string); // Replaces multiple hyphens with single one.
    }     
    //for preventing xss
    public function c($string){
        return htmlspecialchars($string, REPLACE_FLAGS, CHARSET);
    }
    public function hash($val){
        return password_hash($val, PASSWORD_DEFAULT);
    }
    
    
 }

