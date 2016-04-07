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

namespace SparkPost\Controller\Component;

use Cake\Controller\Component;
use Cake\Network\Http\Client;
use Ivory\HttpAdapter\CakeHttpAdapter;
use SparkPost\APIResponseException;
use SparkPost\SparkPost;

class MessageComponent extends Component
{
    public function sendTestMessage()
    {
        // Set up a request adapter
        $httpAdapter = new CakeHttpAdapter(new Client());
        $sparkPostApi = new SparkPost($httpAdapter, [ 'key' => $this->config('apiKey') ]);

        // Build a test message
        $testMessage = [
            'from' => 'From Envelope <from@sparkpostbox.com>',
            'html' => '<html><body><h1>Congratulations, {{name}}!</h1><p>Test email successful.</p></body></html>',
            'text' => 'Congratulations, {{name}}!! Test email successful.',
            'substitutionData'=> ['name' => 'Nosimaj'],
            'subject' => 'SparkPost test email',
            'recipients' => [
                [
                    'address' => [
                        'name' => 'Jamison Bryant',
                        'email' => 'robojamison@gmail.com'
                    ]
                ]
            ]
        ];

        // Send test message
        try {
            return $sparkPostApi->transmission->send($testMessage);
        } catch(APIResponseException $e) {
            return $e;
        }
    }
}