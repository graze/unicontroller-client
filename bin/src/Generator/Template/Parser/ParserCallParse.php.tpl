

    /**
     * @param string $string
     * @return Graze\UnicontrollerClient\Entity\Entity\EntityInterface
     */
    public function parse($string)
    {
        // to make parsing easier, "\r\n," is used as the end token for an array
        // as this response ends with an array, the final ',' is missing, add it here
        return parent::parse($string . ', ');
    }
