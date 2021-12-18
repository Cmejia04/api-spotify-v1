<?php


namespace App\RequestedData;

use Symfony\Component\Validator\Constraints as Assert;

/**
 * Class ArtistTopTrackRequest
 * @package App\RequestedData
 */
class ArtistTopTrackRequest
{
    /**
     * @Assert\Type(type="array")
     * @Assert\NotBlank()
     */
    public $tracks;

}