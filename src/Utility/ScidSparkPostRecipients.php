<?php
    /**
     * Created by PhpStorm.
     * User: sdevore
     * Date: 4/6/17
     * Time: 2:09 PM
     */

    namespace ScidSparkPost\Utility;

    use Cake\Chronos\Chronos;
    use Cake\Chronos\ChronosInterface;
    use Cake\I18n\Date;
    use Cake\Core\Configure;
    use Cake\Core\Exception\Exception;
    use Cake\Filesystem\File;
    use Cake\I18n\FrozenDate;
    use Cake\Utility\Inflector;
    use Money\Currency;
    use Money\Money;
    use Money\Currencies\ISOCurrencies;
    use Money\Formatter\IntlMoneyFormatter;

    /**
     * Utility class
     */
    class ScidSparkPostRecipients
    {
        private  $_receipients = [];



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
            $isDebug = Configure::read('debug');
            if ($isDebug) {
                $recipient = ['address' => ['email' => Configure::read('Config.adminEmail')]];
            } else {
                $recipient = ['address' => ['email' => $email]];
            }

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
         * @return array
         */
        public function getReceipients(): array {
            return $this->_receipients;
        }
    }
