<?php

/*
 * Copyright (c) 2015 Syntax Era Development Studio
 *
 * Licensed under the MIT License (the "License"); you may not use this
 * file except in compliance with the License. You may obtain a copy of
 * the License at
 *
 *      https://opensource.org/licenses/MIT
 *
 * Unless required by applicable law or agreed to in writing, software
 * distributed under the License is distributed on an "AS IS" BASIS,
 * WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
 * See the License for the specific language governing permissions and
 * limitations under the License.
 */

namespace SparkPost\Test\TestCase\Mailer\Transport;

use Cake\Core\Configure;
use Cake\Error\Debugger;
use Cake\Mailer\Email;
use Cake\TestSuite\TestCase;
use SparkPost\Mailer\Transport\SparkPostTransport;

/**
 * SparkPost Transport Test Class
 *
 * Contains unit tests for the functionality of the SparkPostTransport class
 *
 * @package SparkPost\Test\TestCase\Mailer\Transport
 */
class SparkPostTransportTest extends TestCase
{
    /**
     * @var string SparkPost API key
     */
    private $apiKey;

    /**
     * Returns an Email object with the SparkPost transport pre-configured
     */
    private function createEmail()
    {
        // Configure email transport
        Email::configTransport('sparkpost', [
            'className' => 'SparkPost.SparkPost',
            'apiKey' => Configure::read('SparkPost.Api.key')
        ]);

        // Configure email
        $email = new Email();
        $email->transport('sparkpost');

        // Return configured email
        return $email;
    }

    /**
     * Sets up the test (run before each test)
     */
    public function setUp()
    {
        parent::setUp();
        $this->apiKey = Configure::read('SparkPost.Api.key');
    }

    /**
     * Test stub
     */
    public function testNothing()
    {
        $iAmAwesome = true;
        $this->assertEquals($iAmAwesome, true);
    }
}