<?php
/**
 * Created by PhpStorm.
 * User: sdevore
 * Date: 2018-10-09
 * Time: 17:26
 */

namespace  ScidSparkPost\Utility;

use Cake\ORM\Entity;

interface ScidSparkPostRecipientInterface
{
    /**
     * returns a single level array for substituion in bulk email, may be used at the
     * top level or on a single recipient
     *
     * @param Entity $entity
     * @return array
     */
    function __substitutionData($entity): array;


}
