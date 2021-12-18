<?php

namespace App\Service;

use App\RequestedData\ArtistRequest;
use App\RequestedData\ArtistTopTrackRequest;
use App\RequestedData\NewReleasesRequest;
use Symfony\Component\Serializer\SerializerInterface;

class Serializer
{
    /**
     * @var SerializerInterface
     */
    private $serializer;

    /**
     * Serializer constructor.
     * @param SerializerInterface $serializer
     */
    public function __construct(SerializerInterface $serializer)
    {
        $this->serializer = $serializer;
    }

    public function serialize($data): string
    {
        /* Convert the data received from the spotify api to a valid format. */
        return $this->serializer->serialize($data, 'json', [
            'json_encode_options' => \JSON_PRESERVE_ZERO_FRACTION
        ]);
    }

    public function serializeNewReleases($data)
    {
        $dataJson = $this->serialize($data);

        /* Convert to object to manipulate data. */
        return $this->serializer->deserialize($dataJson, NewReleasesRequest::class, 'json');
    }

    public function serializeArtist($data)
    {
        $dataJson = $this->serialize($data);

        /* Convert to object to manipulate data. */
        return $this->serializer->deserialize($dataJson, ArtistRequest::class, 'json');
    }

    public function serializeArtistTopTrack($data)
    {
        $dataJson = $this->serialize($data);

        /* Convert to object to manipulate data. */
        return $this->serializer->deserialize($dataJson, ArtistTopTrackRequest::class, 'json');
    }
}