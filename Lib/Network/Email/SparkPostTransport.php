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
namespace SparkPost\Mailer\Transport;

use Cake\Core\Configure;
use Cake\Mailer\AbstractTransport;
use Cake\Mailer\Email;
use Cake\Network\Exception\BadRequestException;
use Cake\Network\Http\Client;
use Ivory\HttpAdapter\CakeHttpAdapter;
use SparkPost\APIResponseException;
use SparkPost\SparkPost;

/**
 * Spark Post Transport Class
 *
 * Provides an interface between the CakePHP Email functionality and the SparkPost API.
 *
 * @package SparkPost\Mailer\Transport
 */
class SparkPostTransport extends AbstractTransport
{
    /**
     * Send mail via SparkPost REST API
     *
     * @param \Cake\Mailer\Email $email Email message
     * @return array
     */
    public function send(Email $email)
    {
        // Load SparkPost configuration settings
        $apiKey = $this->config('apiKey');

        // Set up HTTP request adapter
        $adapter = new CakeHttpAdapter(new Client());

        // Create SparkPost API accessor
        $sparkpost = new SparkPost($adapter, [ 'key' => $apiKey ]);

        // Pre-process CakePHP email object fields
        $from = (array) $email->from();
        $sender = sprintf('%s <%s>', array_values($from)[0], array_keys($from)[0]);
        $to = (array) $email->to();
        $recipients = [[ 'address' => [ 'name' => array_values($to)[0], 'email' => array_keys($to)[0] ]]];

        // Build message to send
        $message = [
            'from' => $sender,
            'html' => empty($email->message('html')) ? $email->message('text') : $email->message('html'),
            'text' => $email->message('text'),
            'subject' => $email->subject(),
            'recipients' => $recipients
        ];

        // Send message
        try {
            $sparkpost->transmission->send($message);
        } catch(APIResponseException $e) {
            // TODO: Determine if BRE is the best exception type
            throw new BadRequestException(sprintf('SparkPost API error %d (%d): %s (%s)',
                $e->getAPICode(), $e->getCode(), ucfirst($e->getAPIMessage()), $e->getAPIDescription()));
        }
    }
}