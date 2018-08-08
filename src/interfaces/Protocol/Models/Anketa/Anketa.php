<?php namespace professionalweb\sendsay\interfaces\Protocol\Models\Anketa;

use Illuminate\Contracts\Support\Arrayable;

/**
 * Interface for Anketa model
 * @package professionalweb\sendsay\Protocol\Models\Anketa
 */
interface Anketa extends Arrayable
{
    /**
     * Get anketa ID
     *
     * @return string
     */
    public function getId(): string;

    /**
     * Get anketa name
     *
     * @return string
     */
    public function getName(): string;
}