<?php namespace professionalweb\sendsay\Protocol\Models\Anketa;

/**
 * Interface for anketa answers
 * @package professionalweb\sendsay\Protocol\Models\Anketa
 */
interface AnketaAnswer
{
    /**
     * Get parent model
     *
     * @return Anketa
     */
    public function getAnketa(): Anketa;

    /**
     * Get answers
     *
     * @return array
     */
    public function getAnswers(): array;
}