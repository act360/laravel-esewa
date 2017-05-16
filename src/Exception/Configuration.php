<?php

namespace Esewa\Exception;

class Configuration extends \Exception
{
    /**
     * Default Constructor
     *
     * @param string|null $message
     * @param int  $code
     */
    public function __construct($message = null, $code = 0)
    {
        parent::__construct($message, $code);
    }
}
class_alias('Esewa\Configuration', 'EsewaConfigurationException');
