<?php
/**
 * Created by PhpStorm.
 * User: sdevore
 * Date: 2018-10-09
 * Time: 17:21
 */

namespace ScidSparkPost\Model\Entity;

use Cake\ORM\Entity;
use SparkPost\SparkPostResponse;

class ScidSparkPostResponse extends Entity
{
    private $_statusCode;
    private $_body;
    /**
     * @var SparkPostResponse
     */
    private $_response;

    public function __construct(array $properties = [], array $options = []) {
        parent::__construct($properties, $options);
    }

    /**  */


    public function success() {
        return $this->getStatusCode() == 200 ? TRUE : FALSE;
    }

    /**
     * @return mixed
     */
    public function getStatusCode() {

        if (!empty($this->response)) {
            return $this->response->getStatusCode();
        } else {
            return 0;
        }
    }

    /**
     * @return mixed
     */
    public function getBody() {
        if (!empty($this->response)) {
            return $this->response->getBody();
        }
        return NULL;
    }

    /**
     * @return SparkPostResponse
     */
    public function getResponse() {
        return $this->response;
    }

    /**
     * @param SparkPostResponse $response
     */
    public function setResponse($response): void {
        $this->response = $response;

    }


}
