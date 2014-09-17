<?php

/**
 * 
 * @author AnhNV
 *
 */
class My_Validate_PasswordConfirmation extends Zend_Validate_Identical {
	
	protected $_messageTemplates = array(
		self::NOT_SAME => "Mật khẩu phải giống nhau"
	);
	
// 	const NOT_MATCH = 'notMatch';
	
// 	protected $_messageTemplates = array(
// 		self::NOT_MATCH => 'Mật khẩu phải giống nhau'
// 	);
	
// 	public function isValid($value, $context = null) {
		
// 		var_dump($context);exit;
		
// 		$value = (string)$value;
// 		$this->_setValue($value);
	
// 		if (is_array($context)) {
// 			if (isset($context['password']) && ($value == $context['password'])) {
// 				return true;
// 			}
// 		} elseif (is_string($context) && ($value == $context)) {
// 			return true;
// 		}
	
// 		$this->_error(self::NOT_MATCH);
// 		return false;
// 	}
}