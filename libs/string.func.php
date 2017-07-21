<?php

function getRandstring($type, $length)
{
    switch ($type) {
        case 1:
            $string = join('', range(0, 9));
            break;
        case 2:
            $string = join('', array_merge(range('a', 'z'), range('A', 'Z')));
            break;
        case 3:
            $string = join('', array_merge(range(0, 9), range('a', 'z'), range('A', 'Z')));
            break;
        default:
            exit("请输入正确参数！");
            break;
    }
   return $string;
}