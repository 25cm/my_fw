<?php

/**
 * 
 * @author AnhNV
 *
 */
class My_Exception extends Zend_Exception {
	
	private $_errors;
	
	/**
	 * 
	 * @param string $key
	 */
	public function getErrors($key = null) {
		return !is_null($key) ? $this->_errors[$key] : $this->_errors;
	}
	
	/**
	 * 
	 * @param mixed $errors
	 */
	public function setErrors($errors) {
		$this->_errors = $errors;
	}
}

?>