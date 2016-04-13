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
use Cake\TestSuite\TestCase;

/**
 * SparkPost Transport Test Class
 *
 * Contains unit tests for the functionality of the SparkPostTransport class.
 *
 * So, first thing to know is that there is a test method below for EVERY possible error code that the SparkPost API can
 * throw (see https://support.sparkpost.com/customer/en/portal/articles/2140916-extended-error-codes), however this does
 * NOT MEAN that the plugin utilizes this functionality and is therefore at risk for encountering the error. API errors
 * that the plugin will NEVER encounter because it doesn't implement that functionality will not have tests below.
 *
 * At some point, these useless test methods will be removed because they serve no purpose, but we're not sure which
 * methods are used and which aren't at the moment, thus they're all staying put for the time being). For now, the best
 * strategy is probably to mess around with the app-layer implementation and the transport and see what breaks, then
 * develop tests for that. Yay for pen testing!
 *
 * @package SparkPost\Test\TestCase\Mailer\Transport
 */
class SparkPostTransportTest extends TestCase
{
    private $apiKey;

    public function setUp()
    {
        parent::setUp();
        $this->apiKey = Configure::read('SparkPost.Api.key');
    }

    //=====================================================================
    // API ERRORS
    //=====================================================================
    public function testOK() {
		// TODO: Implement me if needed
	}

    public function testOKDelete() {
		// TODO: Implement me if needed
	}

    public function testPermissionDenied() {
		// TODO: Implement me if needed
	}

    public function testInvalidURI() {
		// TODO: Implement me if needed
	}

    public function testInvalidHTTPMethod() {
		// TODO: Implement me if needed
	}

    public function testInvalidQueryString() {
		// TODO: Implement me if needed
	}

    public function testInvalidParams() {
		// TODO: Implement me if needed
	}

    public function testDataFormatTypeLength() {
		// TODO: Implement me if needed
	}

    public function testInvalidCombinationOfFields() {
		// TODO: Implement me if needed
	}

    public function testInvalidCustomerID() {
		// TODO: Implement me if needed
	}

    public function testInvalidUserID() {
		// TODO: Implement me if needed
	}

    public function testInputDataNotUTF8Encoded() {
		// TODO: Implement me if needed
	}

    public function testRequiredFieldMissing() {
		// TODO: Implement me if needed
	}

    public function testRequiredParameterMissing() {
		// TODO: Implement me if needed
	}

    public function testDatabaseUpdateFailed() {
		// TODO: Implement me if needed
	}

    public function testDatabaseReadFailed() {
		// TODO: Implement me if needed
	}

    public function testServerResourcesUnavailable() {
		// TODO: Implement me if needed
	}

    public function testResourceNotFound() {
		// TODO: Implement me if needed
	}

    public function testNoLicense() {
		// TODO: Implement me if needed
	}

    public function testResourceInUse() {
		// TODO: Implement me if needed
	}

    public function testSubresourceNotFound() {
		// TODO: Implement me if needed
	}

    public function testUnsupportedContentType() {
		// TODO: Implement me if needed
	}

    public function testUnacceptableHTTPHeaderValue() {
		// TODO: Implement me if needed
	}

    public function testMessageGenerationUnavailable() {
		// TODO: Implement me if needed
	}

    public function testMessageGenerationFailed() {
		// TODO: Implement me if needed
	}

    public function testMessageGenerationRejected() {
		// TODO: Implement me if needed
	}

    public function testMessageGenerationNotConfigured() {
		// TODO: Implement me if needed
	}

    //=====================================================================
    // TRANSMISSION ERRORS
    //=====================================================================
    public function testTransmissionValidationErrors() {
		// TODO: Implement me if needed
	}

    public function testInvalidTransmissionID() {
		// TODO: Implement me if needed
	}

    public function testSubstitutionDataTooLarge() {
		// TODO: Implement me if needed
	}

    public function testGenerationTimeTooClose() {
		// TODO: Implement me if needed
	}

    public function testTemplateDraftVersionNotFound() {
		// TODO: Implement me if needed
	}

    public function testTemplatePublishedVersionNotFound() {
		// TODO: Implement me if needed
	}

    public function testTransmissionRecordStateInvalid() {
		// TODO: Implement me if needed
	}

    public function testHourlySendingLimitExceeded() {
		// TODO: Implement me if needed
	}

    public function testDailySendingLimitExceeded() {
		// TODO: Implement me if needed
	}

    public function testSandboxSendingLimitExceeded() {
		// TODO: Implement me if needed
	}

    //=====================================================================
    // TEMPLATE ERRORS
    //=====================================================================
    public function testSubtitutiionLanguageSyntaxError() {
		// TODO: Implement me if needed
	}

    public function testSubstitutionRenderError() {
		// TODO: Implement me if needed
	}

    public function testInvalidHeader() {
		// TODO: Implement me if needed
	}

    public function testTemplateMIMEConstructionError() {
		// TODO: Implement me if needed
	}

    public function testTemplateMIMEParsingError() {
		// TODO: Implement me if needed
	}

    public function testTemplateAlreadyExists() {
		// TODO: Implement me if needed
	}

    public function testTemplateContentCorrupt() {
		// TODO: Implement me if needed
	}

    public function testTemplateHTMLContentInvalid() {
		// TODO: Implement me if needed
	}

    //=====================================================================
    // USER MANAGEMENT ERRORS
    //=====================================================================
    public function testUserExists() {
		// TODO: Implement me if needed
	}

    public function testUserDoesNotExist() {
		// TODO: Implement me if needed
	}

    //=====================================================================
    // RECIPIENT LIST ERRORS
    //=====================================================================
    public function testListValidationErrors() {
		// TODO: Implement me if needed
	}

    public function testListAlreadyExists() {
		// TODO: Implement me if needed
	}

    public function testNoValidRecipientsInList() {
		// TODO: Implement me if needed
	}

    //=====================================================================
    // ENGAGEMENT TRACKING ERRORS
    //=====================================================================
    public function testTrackingDomainExists() {
		// TODO: Implement me if needed
	}

    public function testTrackingDomainDoesNotExist() {
		// TODO: Implement me if needed
	}

    //=====================================================================
    // SENDING DOMAIN ERRORS
    //=====================================================================
    public function testSendingDomainBlacklisted() {
		// TODO: Implement me if needed
	}

    public function testInvalidSendingTrackingDomain() {
		// TODO: Implement me if needed
	}

    //=====================================================================
    // BOUNCE DOMAIN ERRORS
    //=====================================================================
    public function testBounceDomainExists() {
		// TODO: Implement me if needed
	}

    public function testBounceDomainDoesNotExist() {
		// TODO: Implement me if needed
	}

}