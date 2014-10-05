<?php

/**
 * 
 * @author AnhNV
 *
 */
class My_Config extends Zend_Config {
    
	/**
	 * 
	 * @param array $array
	 * @param string $allowModifications
	 */
    public function __construct(array $array, $allowModifications = false)
    {
        $this->_allowModifications = (boolean) $allowModifications;
        $this->_loadedSection = null;
        $this->_index = 0;
        $this->_data = array();
        foreach ($array as $key => $value) {
            if (is_array($value)) {
                $this->_data[$key] = new self($value, $this->_allowModifications);
            } else {
                $this->_data[$key] = $value;
            }
        }
        $this->_count = count($this->_data);
    }

    /**
     * (non-PHPdoc)
     * @see Zend_Config::__set()
     */
    public function __set($name, $value)
    {
        if ($this->_allowModifications) {
            if (is_array($value)) {
                $this->_data[$name] = new self($value, true);
            } else {
                $this->_data[$name] = $value;
            }
            $this->_count = count($this->_data);
        } else {
            /** @see Zend_Config_Exception */
            require_once 'Zend/Config/Exception.php';
            throw new Zend_Config_Exception('Zend_Config is read only');
        }
    }

    /**
     * (non-PHPdoc)
     * @see Zend_Config::merge()
     */
    public function merge(Zend_Config $merge)
    {
        foreach($merge as $key => $item) {
            if(array_key_exists($key, $this->_data)) {
                if($item instanceof My_Config && $this->$key instanceof My_Config) {
                    $this->$key = $this->$key->merge(new My_Config($item->toArray(), !$this->readOnly()));
                } else {
                    $this->$key = $item;
                }
            } else {
                if($item instanceof My_Config) {
                    $this->$key = new My_Config($item->toArray(), !$this->readOnly());
                } else {
                    $this->$key = $item;
                }
            }
        }

        return $this;
    }

    /**
     * 
     * @param unknown $path
     * @param string $allowModifications
     * @throws My_Config_Exception
     * @return My_Config
     */
    public static function loadFile($path, $allowModifications = false) {
        if (file_exists($path)) {
            return new My_Config(require($path), $allowModifications);
        }
        else {
            throw new My_Config_Exception('File not found: ' . $path);
        }
    }

}

?>