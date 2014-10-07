<?php

/**
 * 
 * @author AnhNV
 *
 */
class My_Validate_PasswordConfirmation extends Zend_Validate_Abstract
{
    const NOT_MATCH = 'passwordConfirmationNotMatch';

    protected $_confirmPassword;
    
    protected $_messageTemplates = array(
        self::NOT_MATCH => 'Mật khẩu không giống nhau'
    );

    protected $_messageVariables = array(
        'confirmPassword' => '_confirmPassword',
    );
    
    /**
     * 
     * @param string $passwordToCompare
     */
    public function __construct($passwordToCompare = null) {
        $this->_confirmPassword = $passwordToCompare;
    }
    
    /**
     * (non-PHPdoc)
     * @see Zend_Validate_Interface::isValid()
     */
    public function isValid($value = null) {
        
        var_dump($value);echo '<br>';
        var_dump($this->_confirmPassword);
        
        if ($this->_confirmPassword != $value) {
            $this->_error(self::NOT_MATCH);
        }
    }
}