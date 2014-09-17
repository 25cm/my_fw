<?php

/**
 * 
 * @author AnhNV
 *
 */
class My_Validate_Alnum extends Zend_Validate_Alnum {
	
    protected $_messageTemplates = array(
        self::NOT_ALNUM    => 'Chỉ chứa chữ cái và số',
    );
}
?>