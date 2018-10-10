<?php
/**
 * Created by PhpStorm.
 * User: sdevore
 * Date: 2018-10-09
 * Time: 17:29
 */

namespace ScidSparkPost\Mailer;

use Cake\Core\Configure;
use Cake\Mailer\Email;
use Cake\Mailer\Mailer;
use Scid\Mailer\Traits\ScidMailerTrait;
use ScidSparkPost\Mailer\Transport\SparkPostTransport;
use ScidSparkPost\Utility\ScidSparkPostRecipients;
use Tools\Utility\Text;

class SparkPostMailer
{

    use ScidMailerTrait;
    /**
     * Mailer's name.
     *
     * @var string
     */
    static public $name = 'ScidBulkMailer';

    public function email($to, $from, $content, $subject, $substitutionArray = [], $bcc = NULL) {
        if (!empty($substitutionArray)) {
            $content = Text::insert($content, $substitutionArray, $this->insertOptions);
        }
        $this
            ->setTo($to)
            ->setSubjectAndTitle($subject)
            ->setViewVars(compact('content'))
            ->setLayout('default')
            ->setTemplate('bulk_email'); // By default template with same name as method name is used.

        if (!empty($bcc)) {
            $mail = Configure::read('Config.adminEmail');
            $name = Configure::read('Config.adminName');
            if (is_string($bcc)) {
                $mail = $bcc;
            }
            if (is_array($bcc)) {
                $bccEmail = $bcc;
            } else {
                $bccEmail = [$mail => $name];
            }
            $this->setBcc($bccEmail);
        }
    }

    /**
     * @param     ScidSparkPostRecipients $recipients
     * @param     array $from
     * @param     string $subject
     * @param     string $content
     * @param     string $template
     * @param     string $layout
     * @param bool|array $bcc
     * @return void
     */
    public function bulk($recipients, $from, $subject, $content, $bcc = true,$description = null ,$campaignId = null,$template = 'bulk_email', $layout = 'default') {
        $bulkEmail = $this;
        Email::setConfigTransport('sparkpost', [
            'className' => 'ScidSparkPost.SparkPost',
            'apiKey' => Configure::read('ScidSparkPost.apiKey')
        ]);
        $bulkEmail->setTransport('sparkpost');
        $bulkEmail->setTemplate($template);
        if (!empty($layout)) {
            $bulkEmail->setLayout($layout);
        }
        $bulkEmail->setTo(Configure::read('Config.adminEmail'),Configure::read('Config.adminName'));
        if ($bcc) {
            if (TRUE == $bcc) {
                $bulkEmail->setBcc(Configure::read('Config.archiveEmail'),Configure::read('Config.archiveName'));
            }
            else {
                $bulkEmail->setBcc(key($bcc), $bcc[key($bcc)]);
            }
        }
        $bulkEmail->setSubject($subject);
        $bulkEmail->setViewVars(['title'=>$subject,'content'=>$content]);
        /** @var SparkPostTransport $bulkTransport */
        $bulkTransport = $bulkEmail->getTransport();
        if (!empty($description)) {
            $bulkTransport->setDescription($description);
        }
        if (!empty($campaignId)) {
            $bulkTransport->setCampaignId($campaignId);
        }
        $bulkTransport->setReceipients($recipients);

    }
}