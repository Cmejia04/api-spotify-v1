<?php


namespace App\RequestedData;

use Symfony\Component\Validator\Constraints as Assert;

/**
 * Class ArtistRequest
 * @package App\RequestedData
 */
class ArtistRequest
{
    /**
     * @Assert\Type(type="array")
     * @Assert\NotBlank()
     */
    public $followers;

    /**
     * @Assert\Type(type="array")
     * @Assert\NotBlank()
     */
    public $genres;

    /**
     * @Assert\Type(type="string")
     * @Assert\NotBlank()
     */
    public $id;

    /**
     * @Assert\Type(type="array")
     * @Assert\NotBlank()
     */
    public $images;

    /**
     * @Assert\Type(type="string")
     * @Assert\NotBlank()
     */
    public $name;
}