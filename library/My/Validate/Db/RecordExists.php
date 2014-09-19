<?php

/**
 * 
 * @author AnhNV
 *
 */
class My_Validate_Db_RecordExists extends Zend_Validate_Db_RecordExists {
	
	protected $_messageTemplates = array(
		self::ERROR_NO_RECORD_FOUND => "Tài khoản '%value%' không tồn tại"
	);
}