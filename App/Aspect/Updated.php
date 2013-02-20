<?php
class App_Aspect_Updated implements BEAR_Aspect_Before_Interface
{
    public function before(array $values, BEAR_Aspect_JoinPoint $joinPoint)
    {
        $values['modified'] = _BEAR_DATETIME;
        return $values;
    }
}
