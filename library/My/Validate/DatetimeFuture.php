<?php

class Zynas_Validate_DatetimeFuture extends Zend_Validate_Abstract {

    const INVALID_INPUT_FORMAT = 'datetimeFutureInvalidInputFormat';
    const INVALID_DATE = 'datetimeFutureInvalidDate';
    const INVALID_TIME = 'datetimeFutureInvalidTime';
    const BEFORE_OR_ON_DATETIME = 'datetimeFutureAfterOrOnDatetime';

    protected $_messageTemplates = array(
        self::INVALID_INPUT_FORMAT => "不完全な日時の形式です。",
        self::INVALID_DATE => "存在しない日付です。",
        self::INVALID_TIME => "存在しない時刻です。",
        self::AFTER_OR_ON_DATETIME => "未来の日時を選択してください。"
    );

    public function __construct($datetimeToCompare = null) {
        $this->_datetimeToCompareInUts = $datetimeToCompare ? strtotime($datetimeToCompare) : time();
    }

    public function isValid($value) {
        if (!preg_match('/^20[1-9][0-9]-\d{1,2}-\d{1,2}\s\d{1,2}:\d{1,2}:\d{1,2}$/', $value)) {
            $this->_error(self::INVALID_INPUT_FORMAT);
            return false;
        }
        list($year, $month, $day, $hour, $minute, $second) = sscanf($value, '%d-%d-%d %d:%d:%d');
        if (!checkdate($month, $day, $year)) {
            $this->_error(self::INVALID_DATE);
            return false;
        }
        if (!($hour >= 0 && $hour <= 23) ||!($minute >= 0 && $minute <= 59) ||!($second >= 0 && $second <= 59)) {
            $this->_error(self::INVALID_TIME);
            return false;
        }
        if (strtotime($value) <= $this->_datetimeToCompareInUts) {
            $this->_error(self::BEFORE_OR_ON_DATETIME);
            return false;
        }
        return true;
    }

}

?>