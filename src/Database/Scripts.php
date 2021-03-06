<?php

namespace Sokil\IsoCodes\Database;

use Sokil\IsoCodes\AbstractDatabase;
use Sokil\IsoCodes\Database\Scripts\Script;

class Scripts extends AbstractDatabase
{
    /**
     * @return string
     */
    public static function getISONumber()
    {
        return '15924';
    }

    /**
     * @param array $entry
     *
     * @return Script
     */
    protected function arrayToEntry(array $entry)
    {
        return new Script(
            $entry['name'],
            $entry['alpha_4'],
            (int)$entry['numeric']
        );
    }

    /**
     * @return array
     */
    protected function getIndexDefinition()
    {
        return [
            'alpha_4',
            'numeric'
        ];
    }

    /**
     * @param string $alpha4
     *
     * @return null|Script
     */
    public function getByAlpha4($alpha4)
    {
        return $this->find('alpha_4', $alpha4);
    }

    /**
     * @param int $code
     *
     * @return null|Script
     */
    public function getByNumericCode($code)
    {
        return $this->find('numeric', $code);
    }
}
