<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Darmie Blinks
 * Date: 6/4/12
 * Time: 10:45 AM
 * To change this template use File | Settings | File Templates.
 */
class Validator
{
    protected $required;
    protected $inputType;
    protected $errors;
    protected $missing;
    protected $filtered;
    protected $filterArgs;
    protected $submitted;

    public function __construct($required = array(), $inputType = 'post')
    {
        // check to make sure function can be compatible with version of PHP
        if(!function_exists('filter_list'))
        {
            throw New Exception('You cannot use this function because you\'re operating on a lower version of PHP');
        }

        // check to make sure the required field is not empty or is created
        if(!is_array($required) && is_null($required))
        {
            throw new Exception('Required must be an array and cannot be null');
        }

        $this -> required = $required;
        $this -> inputType = $this -> setInputType($inputType);

        if($this -> required)
        {
            $this -> checkRequired();
            $this -> filterArgs = array();
            $this -> errors = array();
        }
    }

    public function isInt($fieldName, $min = null, $max = null)
    {
        $this -> checkDuplicateFilter($fieldName);

        $this -> filterArgs[$fieldName] = array('filter' => FILTER_VALIDATE_INT);

        if($min)
        {
            $this -> filterArgs[$fieldName]['options']['min_range'] = $min;
        }

        if($max)
        {
            $this -> filterArgs[$fieldName]['options']['max_range'] = $max;
        }
    }

    public function isFloat($fieldName, $decimal = '.', $allowThousandSeparator = true)
    {
        $this -> checkDuplicateFilter($fieldName);

        $this -> filterArgs[$fieldName] = array('filter' => FILTER_VALIDATE_FLOAT,
                                                'options' => array('decimal' => $decimal));

        if($allowThousandSeparator)
        {
            $this -> filterArgs[$fieldName]['flags'] = FILTER_FLAG_ALLOW_THOUSAND;
        }

        if($decimal != '.' && $decimal != ',')
        {
            throw new Exception('Decimal point must be a comma(,) or a period(.)');
        }
    }

    public function isEmail($fieldName)
    {
        $this -> checkDuplicateFilter($fieldName);

        $this -> filterArgs[$fieldName] = array('filter' => FILTER_VALIDATE_EMAIL);
    }

    public function isNumericArray($fieldName, $decimal = '.', $allowFraction = true, $allowThousand = true)
    {
        $this -> checkDuplicateFilter($fieldName);

        if($allowThousand)
        {
            $this -> filterArgs[$fieldName]['flags'] |= FILTER_FLAG_ALLOW_THOUSAND;
        }

        if($allowFraction)
        {
            $this -> filterArgs[$fieldName]['flags'] |= FILTER_FLAG_ALLOW_THOUSAND;
        }

        if($decimal != '.' && $decimal != ',')
        {
            throw new Exception('Decimal point must be a comma(,) or a period(.)');
        }

        $this -> filterArgs[$fieldName] = array('filter' => FILTER_VALIDATE_FLOAT,
                                                'options' => array('decimal' => $decimal),
                                                'flags' => FILTER_REQUIRE_ARRAY);
    }

    public function isURL($fieldName, $queryStringRequired = false)
    {
        $this -> checkDuplicateFilter($fieldName);

        $this -> filterArgs[$fieldName]['filter'] = FILTER_VALIDATE_URL;

        if($queryStringRequired)
        {
            $this -> filterArgs[$fieldName]['flags'] = FILTER_FLAG_QUERY_REQUIRED;
        }
    }

    public function isFullURL($fieldName, $queryStringRequired = false)
    {
        $this -> checkDuplicateFilter($fieldName);

        $this -> filterArgs[$fieldName] = array('filter' => FILTER_VALIDATE_URL,
                 'flags' => FILTER_FLAG_SCHEME_REQUIRED | FILTER_FLAG_HOST_REQUIRED | FILTER_FLAG_PATH_REQUIRED);

        if($queryStringRequired)
        {
            $this -> filterArgs[$fieldName]['flags'] |= FILTER_FLAG_QUERY_REQUIRED;
        }
    }

    public function match($fieldName, $pattern)
    {
        $this -> checkDuplicateFilter($fieldName);

        $this -> filterArgs[$fieldName] = array('filter' => FILTER_VALIDATE_REGEXP,
                                                'option' => array('regexp' => $pattern));
    }

    public function removeTags($fieldName, $stripHigh = false, $stripLow = false, $encodeHigh = false, $encodeLow = false, $encodeAmp = false, $preserveQuotes = false)
    {
        $this -> checkDuplicateFilter($fieldName);

        $this -> filterArgs[$fieldName] = array('filter' => FILTER_SANITIZE_STRING, 'flags' => 0);

        if($stripLow)
        {
            $this -> filterArgs[$fieldName]['flags'] |= FILTER_FLAG_STRIP_LOW;
        }

        if($stripHigh)
        {
            $this -> filterArgs[$fieldName]['flags'] |= FILTER_FLAG_STRIP_HIGH;
        }

        if($encodeLow)
        {
            $this -> filterArgs[$fieldName]['flags'] |= FILTER_FLAG_ENCODE_LOW;
        }

        if($encodeHigh)
        {
            $this -> filterArgs[$fieldName]['flags'] |= FILTER_FLAG_ENCODE_HIGH;
        }

        if($encodeAmp)
        {
            $this -> filterArgs[$fieldName]['flags'] |= FILTER_FLAG_ENCODE_AMP;
        }

        if($preserveQuotes)
        {
            $this -> filterArgs[$fieldName]['flags'] |= FILTER_FLAG_NO_ENCODE_QUOTES;
        }
    }

    public function removeTagsFromArray($fieldName, $stripHigh = false, $stripLow = false, $encodeHigh = false, $encodeLow = false, $encodeAmp = false, $preserveQuotes = false)
    {
        $this -> checkDuplicateFilter($fieldName);

        $this -> filterArgs[$fieldName] = array('filter' => FILTER_SANITIZE_STRING, 'flags' => FILTER_REQUIRE_ARRAY);

        if($stripLow)
        {
            $this -> filterArgs[$fieldName]['flags'] |= FILTER_FLAG_STRIP_LOW;
        }

        if($stripHigh)
        {
            $this -> filterArgs[$fieldName]['flags'] |= FILTER_FLAG_STRIP_HIGH;
        }

        if($encodeLow)
        {
            $this -> filterArgs[$fieldName]['flags'] |= FILTER_FLAG_ENCODE_LOW;
        }

        if($encodeHigh)
        {
            $this -> filterArgs[$fieldName]['flags'] |= FILTER_FLAG_ENCODE_HIGH;
        }

        if($encodeAmp)
        {
            $this -> filterArgs[$fieldName]['flags'] |= FILTER_FLAG_ENCODE_AMP;
        }

        if($preserveQuotes)
        {
            $this -> filterArgs[$fieldName]['flags'] |= FILTER_FLAG_NO_ENCODE_QUOTES;
        }
    }

    public function useEntities($fieldName, $stripHigh = false, $stripLow = false, $encodeHigh = false, $isArray = false)
    {
        $this -> checkDuplicateFilter($fieldName);

        $this -> filterArgs[$fieldName] = array('filter' => FILTER_SANITIZE_SPECIAL_CHARS,
                                                'flags' => 0);

        if($stripHigh)
        {
            $this -> filterArgs[$fieldName]['flags'] |= FILTER_FLAG_STRIP_HIGH;
        }

        if($stripLow)
        {
            $this -> filterArgs[$fieldName]['flags'] |= FILTER_FLAG_STRIP_LOW;
        }

        if($encodeHigh)
        {
            $this -> filterArgs[$fieldName]['flags'] |= FILTER_FLAG_ENCODE_HIGH;
        }

        if($isArray)
        {
            $this -> filterArgs[$fieldName]['flags'] |= FILTER_REQUIRE_ARRAY;
        }
    }

    public function checkTextLength($fieldName, $min, $max = null)
    {
        // get the submitted value
        $text = trim($this -> submitted[$fieldName]);

        // make sure its a string
        if(!is_string($text))
        {
            throw new Exception('Method checkTextLength() can only be applied to strings');
        }

        // make sure $min is a number
        if(!is_numeric($min))
        {
            throw new Exception('Method checkTextLength() expects an integer for the second argument');
        }

        // if the string is shorter than the minimum, return an error message
        if(strlen($text) < $min)
        {
            // check if $max is set
            if(is_numeric($max))
            {
                $this -> errors[] = ucfirst($fieldName) . ' must be between ' . $min . ' and ' . $max . ' characters';
            }
            else
            {
                $this -> errors[] = ucfirst($fieldName) . ' must be a minimum of ' . $min . ' characters';
            }
        }

        // if max is set and the string is too long
        if(is_numeric($max) && strlen($text) > $max)
        {
            if($min == 0)
            {
                $this -> errors[] = ucfirst($fieldName) . ' must be a maximum of ' . $max . ' characters';
            }
            else
            {
                $this -> errors[] = ucfirst($fieldName) . ' must be between ' . $min . ' and ' . $max . ' characters';
            }
        }

    }

    public function checkString($fieldName)
    {
        $text = $this -> submitted[$fieldName];
        if(is_numeric($text) == true)
        {
            $this -> errors[] = ucfirst($fieldName) . ' must be a string';
        }
    }

    public function getMissing()
    {
        return $this -> missing;
    }

    public function getFiltered()
    {
        return $this -> filtered;
    }

    public function getErrors()
    {
        return $this -> errors;
    }

    public function validateInput()
    {
        // initialize an array for required items that have not been filtered
        $notFiltered = array();

        // get the names of all elements that have been validated
        $tested = array_keys($this -> filterArgs);

        // loop through the required field
        // add any missing one to the notFiltered Array
        foreach($this -> required as $fields)
        {
            if(!in_array($fields, $tested))
            {
                $notFiltered[] = $fields;
            }
        }

        /* if any item has been added to the nonFiltered array, it means
        a required item hasn't been validated, so throw an Exception.*/
        if($notFiltered)
        {
            throw new Exception('No filter has been set for the following required item(s): ' . implode(',', $notFiltered));
        }

        // apply the validation test using filter_input_array
        $this -> filtered = filter_input_array($this -> inputType, $this -> filterArgs);

        // now find which term failed validation
        foreach($this -> filtered as $key => $val)
        {
            // skip items that are not required
            if(!in_array($key, $this -> required))
            {
                continue;
            }

            // if the filtered value failed validation,
            // add it to the errors array
            elseif($val == false)
            {
                $this -> errors[$key] = ucfirst($key) . ' : invalid data supplied';
            }
        }

        // return the validation input
        return $this -> filtered;
    }

    protected function setInputType($type)
    {
        switch(strtolower($type))
        {
            case 'post':
                $this -> inputType = INPUT_POST;
                $this -> submitted = $_POST;
                break;

            case 'get':
                $this -> inputType = INPUT_GET;
                $this -> submitted = $_GET;
                break;

            default:
                throw new Exception('Invalid Server Submit Type');
        }
    }

    protected function checkRequired()
    {
        // this function checks to make sure all required inputs are not left empty
        $ok = array();
        foreach($this -> submitted as $key => $value)
        {
            // if the value is in the array, it returns it else, it trims it
            $value = is_array($value) ? $value : trim($value);

            if(!empty($value))
            {
                $ok[] = $key;
            }
        }

        $this -> missing = array_diff($this -> required, $ok);
    }

    protected function checkDuplicateFilter($fieldName)
    {
        if(isset($this -> filterArgs[$fieldName]))
        {
            throw new Exception('A filter has already been set on this field: ' . $fieldName);
        }
    }

}
