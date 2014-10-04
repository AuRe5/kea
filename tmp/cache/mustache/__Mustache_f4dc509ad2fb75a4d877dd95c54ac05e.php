<?php

class __Mustache_f4dc509ad2fb75a4d877dd95c54ac05e extends Mustache_Template
{
    public function renderInternal(Mustache_Context $context, $indent = '')
    {
        $buffer = '';
        $newContext = array();

        $buffer .= $indent . '<h1>Form - Hello ';
        $value = $this->resolveValue($context->find('name'), $context, $indent);
        $buffer .= htmlspecialchars($value, 2, 'UTF-8');
        $buffer .= '</h1>
';
        $buffer .= $indent . '<form action=\'/form/\' method=\'POST\'>
';
        $buffer .= $indent . '<input type=\'name\' name=\'name\' id=\'name\' /><input type=\'submit\' value=\'senden\' />
';
        $buffer .= $indent . '</form>';

        return $buffer;
    }
}
