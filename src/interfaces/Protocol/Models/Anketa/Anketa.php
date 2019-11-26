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
     * Set Sendsay id
     *
     * @param string $id
     *
     * @return Anketa
     */
    public function setId(string $id): self;

    /**
     * Get anketa name
     *
     * @return string
     */
    public function getName(): string;

    /**
     * Get available questions
     *
     * @return AnketaQuestion[]
     */
    public function getQuestions(): array;

    /**
     * Check anketa has question
     *
     * @param string $id
     *
     * @return bool
     */
    public function hasQuestions(string $id): bool;
}