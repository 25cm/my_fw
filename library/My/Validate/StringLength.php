<?php

/**
 * 
 * @author AnhNV
 *
 */
class My_Validate_StringLength extends Zend_Validate_StringLength {	
	
    protected $_messageTemplates = array(
        self::TOO_SHORT => 'Ít nhất %min% ký tự',
        self::TOO_LONG  => 'Tối đa %max% ký tự'
    );
}
?>