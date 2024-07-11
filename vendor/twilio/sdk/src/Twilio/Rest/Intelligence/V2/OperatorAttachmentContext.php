<?php

/**
 * This code was generated by
 * ___ _ _ _ _ _    _ ____    ____ ____ _    ____ ____ _  _ ____ ____ ____ ___ __   __
 *  |  | | | | |    | |  | __ |  | |__| | __ | __ |___ |\ | |___ |__/ |__|  | |  | |__/
 *  |  |_|_| | |___ | |__|    |__| |  | |    |__] |___ | \| |___ |  \ |  |  | |__| |  \
 *
 * Twilio - Intelligence
 * This is the public Twilio REST API.
 *
 * NOTE: This class is auto generated by OpenAPI Generator.
 * https://openapi-generator.tech
 * Do not edit the class manually.
 */


namespace Twilio\Rest\Intelligence\V2;

use Twilio\Exceptions\TwilioException;
use Twilio\Values;
use Twilio\Version;
use Twilio\InstanceContext;


class OperatorAttachmentContext extends InstanceContext
    {
    /**
     * Initialize the OperatorAttachmentContext
     *
     * @param Version $version Version that contains the resource
     * @param string $serviceSid The unique SID identifier of the Service.
     * @param string $operatorSid The unique SID identifier of the Operator. Allows both Custom and Pre-built Operators.
     */
    public function __construct(
        Version $version,
        $serviceSid,
        $operatorSid
    ) {
        parent::__construct($version);

        // Path Solution
        $this->solution = [
        'serviceSid' =>
            $serviceSid,
        'operatorSid' =>
            $operatorSid,
        ];

        $this->uri = '/Services/' . \rawurlencode($serviceSid)
        .'/Operators/' . \rawurlencode($operatorSid)
        .'';
    }

    /**
     * Create the OperatorAttachmentInstance
     *
     * @return OperatorAttachmentInstance Created OperatorAttachmentInstance
     * @throws TwilioException When an HTTP error occurs.
     */
    public function create(): OperatorAttachmentInstance
    {

        $headers = Values::of(['Content-Type' => 'application/x-www-form-urlencoded' ]);
        $payload = $this->version->create('POST', $this->uri, [], [], $headers);

        return new OperatorAttachmentInstance(
            $this->version,
            $payload,
            $this->solution['serviceSid'],
            $this->solution['operatorSid']
        );
    }


    /**
     * Delete the OperatorAttachmentInstance
     *
     * @return bool True if delete succeeds, false otherwise
     * @throws TwilioException When an HTTP error occurs.
     */
    public function delete(): bool
    {

        $headers = Values::of(['Content-Type' => 'application/x-www-form-urlencoded' ]);
        return $this->version->delete('DELETE', $this->uri, [], [], $headers);
    }


    /**
     * Provide a friendly representation
     *
     * @return string Machine friendly representation
     */
    public function __toString(): string
    {
        $context = [];
        foreach ($this->solution as $key => $value) {
            $context[] = "$key=$value";
        }
        return '[Twilio.Intelligence.V2.OperatorAttachmentContext ' . \implode(' ', $context) . ']';
    }
}
