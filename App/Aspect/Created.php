<?php
class App_Aspect_Created implements BEAR_Aspect_Before_Interface
{
    public function before(array $values, BEAR_Aspect_JoinPoint $joinPoint)
    {
        $values['created'] = _BEAR_DATETIME;
        return $values;
    }
}
