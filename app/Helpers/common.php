<?php

if (!function_exists('isValidIBAN')) {

    function isValidIBAN($iban) {
        
        // Remove spaces and convert to uppercase
        $iban = strtoupper(str_replace(' ', '', $iban));

        // IBAN format check
        if (!preg_match('/^[a-zA-Z]{2}[0-9]{2}[a-zA-Z0-9]{4}[0-9]{7}([a-zA-Z0-9]?){0,16}/', $iban)) {
            return false;
        }

        

        // Move the four initial characters to the end of the string
        $iban = substr($iban, 4) . substr($iban, 0, 4);

        // Replace letters with digits
        $ibanDigits = '';
        foreach (str_split($iban) as $char) {
            if (is_numeric($char)) {
                $ibanDigits .= $char;
            } else {
                $ibanDigits .= (ord($char) - 55);
            }
        }

        // Check if it's divisible by 97
        if (bcmod($ibanDigits, '97') === '1') {
            return true;
        }

        return false;
    }

}






