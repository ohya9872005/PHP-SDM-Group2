<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');   
class  MY_Controller  extends  CI_Controller  {  
    public function __construct(){  
        parent::__construct();  
        $this->_init();  
    }  
    protected function _init(){  
        session_start();  
    }  

    public function MailAdapter($emailmessage,$email,$subject){
	     $this->MailGmail($emailmessage,$email,$subject);

	}

	function MailGmail($emailmessage,$email,$subject) {
		$ci = get_instance();
		$ci->load->library('email');
		$config['protocol'] = "smtp";
		$config['smtp_host'] = "ssl://smtp.gmail.com";
		$config['smtp_port'] = "465";
		$config['smtp_user'] = "ntusdm2013group2@gmail.com"; 
		$config['smtp_pass'] = "xu3jo6vmp6";
		$config['charset'] = "utf-8";
		$config['mailtype'] = "html";
		$config['newline'] = "\r\n";

		$ci->email->initialize($config);

		$ci->email->from('ntusdm2013group2@gmail.com', 'SDMservice');
		$list = array($email);
		$ci->email->to($list);
		$ci->email->subject($subject);
		$ci->email->message($emailmessage);
		$ci->email->send();
	}
} 