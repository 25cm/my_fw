<?php

/**
 * 
 * @author AnhNV
 *
 */
class My_Inflector {

	/**
	 * 
	 * @param string $word
	 */
    public static function underscore($word) {
        return strtolower(preg_replace('/(?<=\\w)([A-Z])/', '_\\1', $word));
    }

    /**
     * 
     * @param unknown $word
     * @param string $ucfirst
     * @param string $separator
     * @return Ambigous <string, unknown>
     */
    public static function camelize($word, $ucfirst = true, $separator = '_') {
        $camelized = str_replace(' ', '', ucwords(str_replace($separator, ' ', $word)));
        return $ucfirst ? $camelized : strtolower(substr($camelized, 0, 1)) . substr($camelized, 1);
    }
    
}

?>
