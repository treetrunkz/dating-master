<?php

class Validate
{
    /**
     * @var DataLayer
     */
    private $_dataLayer;

    /**
     * Validate constructor.
     */
    public function __construct()
    {
        $this->_dataLayer = new DataLayer();
    }

    /* Validate a first
     * Food must not be empty and may only consist
     * of alphabetic characters.
     *
     * @param String first
     * @return boolean
     */
    function validFirst($first)
    {
        return !empty($first) && ctype_alpha($first);
    }

    /* Validate quantity
     * Quantity must not be empty and must be a number
     * greater than 1.
     *
     * @param String last
     * @return boolean
     */
    function validLast($last)
    {
        return !empty($last) && ctype_alpha($last);
    }

    /* Validate Age
     * Age must be numeric
     *
     */
    function validAge($age)
    {
        return !empty($age) && ctype_digit($age) && $age > 18 && $age < 118;
    }

    /* Validate a gender
     *
     * @param String gender
     * @return boolean
     */
    function validGender($gender)
    {
        global $f3;
        return in_array($gender, $f3->get('genders'));
    }

    /* Validate Phone
     *
     * @param String phone
     * valid if phone is a numeric or not empty
     */
    function validPhone($phone)
    {
        return !empty($phone) && ctype_digit($phone);
    }

    /* Validate Email
     *
     * @param String email
     * validate whether the input will be an accurate email or not
     */
    function validEmail($email)
    {
        // Checks if valid email
        return !empty($email)
            && (filter_var($email, FILTER_VALIDATE_EMAIL));
    }

    /* Validate Outdoor
     *
     * @param String outdoor
     * validate indoor inputs.
     */
    function validOutdoor($outdoor): bool
    {
    $validOutdoor = $this->_dataLayer->getOutdoor();
    foreach ($outdoor as $outdoorOptions) {
        if(!in_array($outdoorOptions, $validOutdoor)) {
            return false;
        }
    }
    return true;
    }

    /* Validate Indoor
     *
     * @param String indoor
     * validate indoor inputs.
     */
    function validIndoor($indoor): bool
    {
        $validIndoor = $this->_dataLayer->getIndoor();
        foreach ($indoor as $indoorOptions) {
            if(!in_array($indoorOptions, $validIndoor)) {
                return false;
            }
        }
        return true;
    }


}
