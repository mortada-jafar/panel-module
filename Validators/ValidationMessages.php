<?php

namespace Modules\PanelCore\Validators;

use Illuminate\Support\Facades\App;

/**
 * @author Shahrokh Niakan <sh.niakan@anetwork.ir>
 * @since Sep 11, 2016
 */
class ValidationMessages
{
    /**
     * @var string
     */
    protected $lang;

    /**
     * @var array
     */
    protected $config;

    /**
     * @var array
     */
    protected static $messages;

    /**
     * @var array
     */
    protected static $app;

    /**
     * @author Shahrokh Niakan <sh.niakan@anetwork.ir>
     * @since Sep 21, 2016
     */
    public function __construct()
    {
        $this->lang = App::getLocale();

        $this->config = include __DIR__ . '/../lang/' . $this->lang . '.php';
    }

    /**
     * set user custom messeages
     * @param $validator
     * @author Shahrokh Niakan <sh.niakan@anetwork.ir>
     * @since Jun 6, 2017
     */
    public static function setCustomMessages($validator)
    {

        if ($validator) {
                self::$messages = $validator->customMessages;
//                self::$messages = $validator->getCustomMessages();
        }
    }

    /**
     * get validations message
     * @param $message
     * @param $attribute
     * @param $rule
     * @return string
     * @since Jun 10, 2017
     * @author Shahrokh Niakan <sh.niakan@anetwork.ir>
     */
    public function Msg($message, $attribute, $rule)
    {
        if (isset(self::$messages[$rule])) {
            return str_replace($message, self::$messages[$rule], $message);
        }

        return str_replace($message, $this->config[$rule], $message);
    }

}
