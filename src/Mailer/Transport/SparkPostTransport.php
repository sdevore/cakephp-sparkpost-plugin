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
use Cake\Http\Client as CakeClient;
use Cake\Utility\Text;
use Http\Adapter\Cake\Client as CakeAdaptor;
use Migrations\CakeAdapter;
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
    protected $_receipients = []; // array of recipients per sparkpost formats
    protected $_substitution_data = [];
    protected $_description = NULL; //Description of the transmission. Maximum length - 1024 bytes
    protected $_campaign_id = NULL; //Name of the campaign. Maximum length - 64 bytes

    /**
     * Send mail via SparkPost REST API
     *
     * @param \Cake\Mailer\Email $email Email message
     * @return array
     */
    public function send(Email $email) {
        // Load SparkPost configuration settings
        $apiKey = $this->getConfig('ScidSparkPost.apiKey');

        // Set up HTTP request adapter
        $adapter = new CakeAdaptor(new CakeClient());

        // Create SparkPost API accessor
        $sparkpost = new SparkPost($adapter, ['key' => $apiKey]);

        // Pre-process CakePHP email object fields
        $from = (array)$email->getFrom();
        if (empty($this->_receipients)) {
            $toArray = $email->getTo();
            $recipients = [
                ['address' => []],
            ];
        } else {
            $recipients = $this->_receipients;
        }
        $message = [
            'content' => [
                'from'    => $from,
                'subject' => $email->getSubject(),
                'html'    => empty($email->message('html')) ? $email->message('text') : $email->message('html'),
                'text'    => $email->message('text'),
            ],
        ];
        $cc = $email->getCc();
        $bcc = $email->getBcc();


        // Build message to send
        if (!empty($this->_description)) {
            $message['description'] = $this->_description;
        }
        if (!empty($this->_campaign_id)) {
            $message['campaign_id'] = $this->_campaign_id;
        }
        if (!empty($this->_substitution_data)) {
            $message['substitution_data'] = $this->_substitution_data;
        }

        // Send message
        $promise = $sparkpost->transmissions->post($message);
        try {
            $response = $promise->wait();
            $return = [
                'result' => 'success',
                'code'=>$response->getStatusCode(),
                'body' => $response->getBody(),
            ];
            return $return;
        } catch (\Exception $e) {
            // TODO: Determine if BRE is the best exception type
            throw new BadRequestException(__('SparkPost API error {0}: {1}',
                                             [$e->getCode(), ucfirst($e->getMessage())]));
        }
    }

    public function setDescription ($description) {
        $this->_description = Text::truncate($description, 500 );
    }

    public function setCampaignId($id) {
        $this->_campaign_id = Text::truncate($id, 60);
    }

    /**
     * @param   string    $email
     * @param null|string $name
     * @param null|array  $subsitution_data
     *
     * @param null|array  $tags     Array of text labels associated with a recipient. Tags are available in Webhook events. Maximum number of tags - 10 per recipient,
     *                              100 system wide. Any tags over the limits are ignored.
     * @param null|array  $metadata Key/value pairs associated with a recipient. Metadata is available during events through the Webhooks and is provided to
     *                              the template engine. A maximum of 1000 bytes of merged metadata (transmission level + recipient level) is available
     *                              with recipient metadata taking
     *                              precedence over transmission metadata when there are conflicts.
     * @return $this
     */
    public function addRecipient($email, $name = NULL, $subsitution_data = NULL, $tags = NULL, $metadata = NULL) {
        $recipient = ['address' => ['email']];
        if (!empty($name)) {
            $recipient['address']['name'] = h($name);
        }
        if (!empty($subsitution_data)) {
            $recipient['substitution_data'] = $subsitution_data;

        }
        if (!empty($tags)) {
            $recipient['tags'] = $tags;
        }
        if (!empty($metadata)) {
            $recipient['metadata'] = $metadata;
        }
        $this->_receipients[] = $recipient;
        return $this;
    }

    /**
     * @param array $substitution_data
     *
     * @return $this
     */
    public function addSubtitutionData($substitution_data) {

        return $this;
    }
}
