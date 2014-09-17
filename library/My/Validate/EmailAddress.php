<?php

/**
 * 
 * @author AnhNV
 *
 */
class My_Validate_EmailAddress extends Zend_Validate_EmailAddress {
	
    protected $_messageTemplates = array(
        self::INVALID            => 'Không đúng định dạng email',
        self::INVALID_FORMAT     => 'Không đúng định dạng email',
    );
}
?>