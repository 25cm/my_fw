<?php

/**
 * 
 * @author AnhNV
 *
 */
class My_View_Helper {

	/**
	 * 
	 * @var Zend_View_Interface
	 */
    private $_view;

    /**
     * 
     * @param Zend_View_Interface $view
     */
    public function setView(Zend_View_Interface $view) {
        $this->_view = $view;
    }

    /**
     * getView
     */
    public function getView() {
        return $this->_view;
    }

}

?>