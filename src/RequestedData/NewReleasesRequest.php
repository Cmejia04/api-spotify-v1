<?php

namespace App\RequestedData;

use Symfony\Component\Validator\Constraints as Assert;

/**
 * Class NewReleasesRequest
 * @package App\RequestedData
 */
class NewReleasesRequest
{
    /**
     * @Assert\Type(type="string")
     * @Assert\NotBlank()
     */
    public $href;
    /**
     * @Assert\Type(type="array")
     * @Assert\NotBlank()
     */
    public $items;
    /**
     * @Assert\Type(type="integer")
     * @Assert\NotBlank()
     */
    public $limit;
    /**
     * @Assert\Type(type="string")
     * @Assert\NotBlank()
     */
    public $next;
    /**
     * @Assert\Type(type="integer")
     * @Assert\NotBlank()
     */
    public $offset;
    /**
     * @Assert\Type(type="string")
     */
    public $previous;
    /**
     * @Assert\Type(type="integer")
     * @Assert\NotBlank()
     */
    public $total;
}