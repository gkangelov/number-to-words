<?php

namespace Kwn\NumberToWords\Language\French\Dictionary;

class Number
{
    protected $zero = 'zéro';

    protected $units = [
        '',
        'un',
        'deux',
        'trois',
        'quatre',
        'cinq',
        'six',
        'sept',
        'huit',
        'neuf'
    ];

    protected $teens = [
        'dix',
        'onze',
        'douze',
        'treize',
        'quatorze',
        'quinze',
        'seize',
        'dix-sept',
        'dix-huit',
        'dix-neuf'
    ];

    protected $tens = [
        '',
        'dix',
        'vingt',
        'trente',
        'quarante',
        'cinquante',
        'soixante',
        'soixante-dix',
        'quatre-vingts',
        'quatre-vingt-dix'
    ];

    protected $hundred = 'cent';

    protected $mega = [
        '',
        'millier',
        'million',
        'milliard',
        'billion',
        'quadrillion',
        'quintillion',
        'sextillion'
    ];

    /**
     * @return string
     */
    public function getZero()
    {
        return $this->zero;
    }

    /**
     * @param int $value
     *
     * @return string
     */
    public function getUnit($value)
    {
        return $this->units[$value];
    }

    /**
     * @param int $tens
     * @param int $units
     *
     * @return string
     */
    public function getSubHundred($tens, $units)
    {
        $words = "";
        if ($tens === 1) {
            $words .= " " . $this->teens[$units];
        } else {
            if ($tens > 0) {
                $words .= " " . $this->tens[$tens];
                if ($units === 1) {
                    $words .= " et " . $this->units[$units];
                } elseif ($units > 1) {
                    $words .= "-" . $this->units[$units];
                }
            } else {
                $words .= $this->units[$units];
            }

        }
        return trim($words);
    }

    /**
     * @param int $value
     *
     * @return string
     */
    public function getHundred($value)
    {
        if ($word = $this->getUnit($value)) {
            if ($value === 1) {
                return $this->hundred;
            } else {
                return $word . ' ' . $this->hundred;
            }

        }
    }

    /**
     * @param int $scale
     *
     * @return string
     */
    public function getMega($scale)
    {
        if ($word = $this->mega[$scale]) {
            return $word;
        }
    }
}
