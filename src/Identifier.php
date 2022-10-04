<?php

namespace Leandro\SillyPascal;

class Identifier
{
    public function validate(string $s): bool
    {
        $valid_id = false;

        if (strlen($s)) {
            $achar    = $s[0];
            $valid_id = $this->valid_s($achar);

            if (strlen($s) > 1) {
                $achar = $s[1];
                $i     = 1;
                while ($i < strlen($s) - 1) {
                    $achar = $s[$i];
                    if (!$this->valid_f($achar)) {
                        $valid_id = false;
                    }
                    $i++;
                }
            }
        }

        if ($valid_id && (strlen($s) >= 1) && (strlen($s) <= 6)) {
            return true;
        } else {
            return false;
        }
    }

    private function valid_s(string $ch)
    {
        if ((($ch >= 'A') && ($ch <= 'Z'))
            || (($ch >= 'a') && ($ch <= 'z'))) {
            return true;
        } else {
            return false;
        }
    }

    private function valid_f(string $ch)
    {
        if ((($ch >= 'A') && ($ch <= 'Z'))
            || (($ch >= 'a') && ($ch <= 'z'))
            || (($ch >= '0') && ($ch <= '9'))) {
            return true;
        } else {
            return false;
        }
    }
}
