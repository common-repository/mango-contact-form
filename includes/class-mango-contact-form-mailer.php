<?php 
class Mango_Contact_Form_Mailer {
  
  protected $to;
  protected $subject;
  protected $content;
  protected $header;
  protected $curretDomain;
  
 
  public function __construct(){
    $this->to = get_option("admin_email");
    $this->currentDomain = preg_replace('/www\./i', '', $_SERVER['SERVER_NAME']);
    $this->subject="New contact from ".$this->currentDomain;
    $this->setHeader();
  }
  

  
  public function setBody($name,$email,$phone,$message ){
     $content="<div>";
     $content.="<p style='font-size:1.3em'>";
     $content.=$message;
     $content.="</p>";
     $content.= "<div>Name: ".$name."<br></div>";
     $content.= "</div>email: ".$email."<br></div>";
     $content.= "</div>email: ".$phone. "</div>";
     $content.="</div>";
     $this->content=$content;
  }
  public function setHeader(){
       
       	$headers = "From: Web Contact contact@$this->currentDomain" . "\r\n" ;
    		$headers .="Reply-To: ". $this->to . "\r\n" ;
    		$headers .="X-Mailer: PHP/" . phpversion();
    		$headers .= "MIME-Version: 1.0\r\n";
    		$headers .= "Content-type: text/html; charset=iso-8859-1\r\n";   
        $this->header=$headers;
  }
  
  public function send(){
        if (mail( $this->to, $this->subject, $this->content, $this->header)) {
            return true ;
        } else {
           return false  ;
        }

   return false;
  }
  
  
}