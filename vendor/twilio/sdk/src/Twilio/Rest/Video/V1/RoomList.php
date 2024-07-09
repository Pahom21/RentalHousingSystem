<?php

/**
 * This code was generated by
 * ___ _ _ _ _ _    _ ____    ____ ____ _    ____ ____ _  _ ____ ____ ____ ___ __   __
 *  |  | | | | |    | |  | __ |  | |__| | __ | __ |___ |\ | |___ |__/ |__|  | |  | |__/
 *  |  |_|_| | |___ | |__|    |__| |  | |    |__] |___ | \| |___ |  \ |  |  | |__| |  \
 *
 * Twilio - Video
 * This is the public Twilio REST API.
 *
 * NOTE: This class is auto generated by OpenAPI Generator.
 * https://openapi-generator.tech
 * Do not edit the class manually.
 */

namespace Twilio\Rest\Video\V1;

use Twilio\Exceptions\TwilioException;
use Twilio\ListResource;
use Twilio\Options;
use Twilio\Stream;
use Twilio\Values;
use Twilio\Version;
use Twilio\Serialize;


class RoomList extends ListResource
    {
    /**
     * Construct the RoomList
     *
     * @param Version $version Version that contains the resource
     */
    public function __construct(
        Version $version
    ) {
        parent::__construct($version);

        // Path Solution
        $this->solution = [
        ];

        $this->uri = '/Rooms';
    }

    /**
     * Create the RoomInstance
     *
     * @param array|Options $options Optional Arguments
     * @return RoomInstance Created RoomInstance
     * @throws TwilioException When an HTTP error occurs.
     */
    public function create(array $options = []): RoomInstance
    {

        $options = new Values($options);

        $data = Values::of([
            'EnableTurn' =>
                Serialize::booleanToString($options['enableTurn']),
            'Type' =>
                $options['type'],
            'UniqueName' =>
                $options['uniqueName'],
            'StatusCallback' =>
                $options['statusCallback'],
            'StatusCallbackMethod' =>
                $options['statusCallbackMethod'],
            'MaxParticipants' =>
                $options['maxParticipants'],
            'RecordParticipantsOnConnect' =>
                Serialize::booleanToString($options['recordParticipantsOnConnect']),
            'VideoCodecs' =>
                $options['videoCodecs'],
            'MediaRegion' =>
                $options['mediaRegion'],
            'RecordingRules' =>
                Serialize::jsonObject($options['recordingRules']),
            'AudioOnly' =>
                Serialize::booleanToString($options['audioOnly']),
            'MaxParticipantDuration' =>
                $options['maxParticipantDuration'],
            'EmptyRoomTimeout' =>
                $options['emptyRoomTimeout'],
            'UnusedRoomTimeout' =>
                $options['unusedRoomTimeout'],
            'LargeRoom' =>
                Serialize::booleanToString($options['largeRoom']),
        ]);

        $headers = Values::of(['Content-Type' => 'application/x-www-form-urlencoded' ]);
        $payload = $this->version->create('POST', $this->uri, [], $data, $headers);

        return new RoomInstance(
            $this->version,
            $payload
        );
    }


    /**
     * Reads RoomInstance records from the API as a list.
     * Unlike stream(), this operation is eager and will load `limit` records into
     * memory before returning.
     *
     * @param array|Options $options Optional Arguments
     * @param int $limit Upper limit for the number of records to return. read()
     *                   guarantees to never return more than limit.  Default is no
     *                   limit
     * @param mixed $pageSize Number of records to fetch per request, when not set
     *                        will use the default value of 50 records.  If no
     *                        page_size is defined but a limit is defined, read()
     *                        will attempt to read the limit with the most
     *                        efficient page size, i.e. min(limit, 1000)
     * @return RoomInstance[] Array of results
     */
    public function read(array $options = [], int $limit = null, $pageSize = null): array
    {
        return \iterator_to_array($this->stream($options, $limit, $pageSize), false);
    }

    /**
     * Streams RoomInstance records from the API as a generator stream.
     * This operation lazily loads records as efficiently as possible until the
     * limit
     * is reached.
     * The results are returned as a generator, so this operation is memory
     * efficient.
     *
     * @param array|Options $options Optional Arguments
     * @param int $limit Upper limit for the number of records to return. stream()
     *                   guarantees to never return more than limit.  Default is no
     *                   limit
     * @param mixed $pageSize Number of records to fetch per request, when not set
     *                        will use the default value of 50 records.  If no
     *                        page_size is defined but a limit is defined, stream()
     *                        will attempt to read the limit with the most
     *                        efficient page size, i.e. min(limit, 1000)
     * @return Stream stream of results
     */
    public function stream(array $options = [], int $limit = null, $pageSize = null): Stream
    {
        $limits = $this->version->readLimits($limit, $pageSize);

        $page = $this->page($options, $limits['pageSize']);

        return $this->version->stream($page, $limits['limit'], $limits['pageLimit']);
    }

    /**
     * Retrieve a single page of RoomInstance records from the API.
     * Request is executed immediately
     *
     * @param mixed $pageSize Number of records to return, defaults to 50
     * @param string $pageToken PageToken provided by the API
     * @param mixed $pageNumber Page Number, this value is simply for client state
     * @return RoomPage Page of RoomInstance
     */
    public function page(
        array $options = [],
        $pageSize = Values::NONE,
        string $pageToken = Values::NONE,
        $pageNumber = Values::NONE
    ): RoomPage
    {
        $options = new Values($options);

        $params = Values::of([
            'Status' =>
                $options['status'],
            'UniqueName' =>
                $options['uniqueName'],
            'DateCreatedAfter' =>
                Serialize::iso8601DateTime($options['dateCreatedAfter']),
            'DateCreatedBefore' =>
                Serialize::iso8601DateTime($options['dateCreatedBefore']),
            'PageToken' => $pageToken,
            'Page' => $pageNumber,
            'PageSize' => $pageSize,
        ]);

        $response = $this->version->page('GET', $this->uri, $params);

        return new RoomPage($this->version, $response, $this->solution);
    }

    /**
     * Retrieve a specific page of RoomInstance records from the API.
     * Request is executed immediately
     *
     * @param string $targetUrl API-generated URL for the requested results page
     * @return RoomPage Page of RoomInstance
     */
    public function getPage(string $targetUrl): RoomPage
    {
        $response = $this->version->getDomain()->getClient()->request(
            'GET',
            $targetUrl
        );

        return new RoomPage($this->version, $response, $this->solution);
    }


    /**
     * Constructs a RoomContext
     *
     * @param string $sid The SID of the Room resource to fetch.
     */
    public function getContext(
        string $sid
        
    ): RoomContext
    {
        return new RoomContext(
            $this->version,
            $sid
        );
    }

    /**
     * Provide a friendly representation
     *
     * @return string Machine friendly representation
     */
    public function __toString(): string
    {
        return '[Twilio.Video.V1.RoomList]';
    }
}
