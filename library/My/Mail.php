<?php

/**
 * 
 * @author AnhNV
 *
 */
class My_Mail {
	
	/**
	 * 
	 * @var to email
	 */
	protected $_to;
	
	/**
	 * 
	 * @var mail subject
	 */
	protected $_subject;
	
	/**
	 * 
	 * @var mail body
	 */
	protected $_html;
	
	/**
	 * 
	 * @param string $from
	 * @param string $to
	 * @param string $subject
	 * @param string $html
	 */
	public function __construct($to = null, $subject = null, $html = null) {
		$this->_to = $to;
		$this->_subject = $subject;
		$this->_html = $html;
	}
	
	/**
	 * 
	 * @param string $to
	 */
	public function setTo($to) {
		$this->_to = $to;
	}
	
	/**
	 * 
	 * @param string $subject
	 */
	public function setSubject($subject) {
		$this->_subject = $subject;
	}
	
	/**
	 * 
	 * @param string $html
	 */
	public function setHtml($html) {
		$this->_html = $html;
	}
	
	/**
	 * 
	 * @throws Zend_Mail_Transport_Exception
	 */
	public function sendHtml() {
		try {		
			$config = array(
					'auth' => My_Registry::getConfig()->system->mail->setting->auth,
					'username' => My_Registry::getConfig()->system->mail->setting->username,
					'password' => My_Registry::getConfig()->system->mail->setting->password,
					'ssl' => My_Registry::getConfig()->system->mail->setting->ssl,
					'port' => My_Registry::getConfig()->system->mail->setting->port
			);
		
			$trans = new Zend_Mail_Transport_Smtp(My_Registry::getConfig()->system->mail->setting->host, $config);
			Zend_Mail::setDefaultTransport($trans);
		
			$mail = new Zend_Mail("utf-8");
			$mail->setType(Zend_Mime::MULTIPART_RELATED);
			$mail->setFrom(My_Registry::getConfig()->system->mail->setting->username, My_Registry::getConfig()->system->mail->setting->from_name);
			$mail->addTo($this->_to);
			$mail->setSubject($this->_subject);
			$mail->setBodyHtml($this->_html);
			$mail->send();
		} catch (Zend_Mail_Transport_Exception $e) {
			throw $e;
		}
	}
}