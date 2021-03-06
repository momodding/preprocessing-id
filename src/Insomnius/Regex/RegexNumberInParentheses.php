<?php

namespace Insomnius\Regex;

use Insomnius\History\Detail;

class RegexNumberInParentheses implements RegexInterface
{
    public function regex($word)
    {
        $matches  = null;
        
        $patern     = '/[\[\({]+\d+[\]\)}]/';
        $contains   = preg_match_all($patern, $word, $matches);
        $process    = preg_replace($patern, '', $word);

        $detail     = new Detail();
        $detail->groupProcess   = 'Regex';
        $detail->process        = 'Regex';
        $detail->class          = get_class($this);
        $detail->detail         = 'Get rid of all number inside the parentheses.';
        $detail->match          = $matches[0];
        
        $detail->wordAfterProcess   = $process;
        $detail->wordBeforeProcess  = $word;
        
        return $detail;
    }
}