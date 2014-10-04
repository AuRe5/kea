<?php

class __Mustache_2ea1d7d9b4e71579d9cb3e4cbd6c3edb extends Mustache_Template
{
    public function renderInternal(Mustache_Context $context, $indent = '')
    {
        $buffer = '';
        $newContext = array();

        $buffer .= $indent . '<h1>Form</h1>
';
        $buffer .= $indent . '<form action=\'/save\' method=\'POST\'>
';
        $buffer .= $indent . '<input type=\'name\' name=\'name\' id=\'name\' /><input type=\'submit\' value=\'senden\' />
';
        $buffer .= $indent . '</form>';

        return $buffer;
    }
}
