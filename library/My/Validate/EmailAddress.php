<?php

/**
 * 
 * @author AnhNV
 *
 */
class My_Validate_EmailAddress extends Zend_Validate_EmailAddress {
	
    protected $_messageTemplates = array(
        self::INVALID            => "Không đúng định dạng email",
        self::INVALID_FORMAT     => "Không đúng định dạng email",
    	self::INVALID_HOSTNAME   => "Không đúng định dạng email",
    	self::INVALID_MX_RECORD  => "Không đúng định dạng email",
    	self::INVALID_SEGMENT    => "Không đúng định dạng email",
    	self::DOT_ATOM           => "Không đúng định dạng email",
    	self::QUOTED_STRING      => "Không đúng định dạng email",
    	self::INVALID_LOCAL_PART => "Không đúng định dạng email",
    	self::LENGTH_EXCEEDED    => "Không đúng định dạng email",
    );
}
?>