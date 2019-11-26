<?php namespace professionalweb\sendsay\interfaces\Protocol\Models\Anketa;

use Illuminate\Contracts\Support\Arrayable;

/**
 * Interface for anketa answers
 * @package professionalweb\sendsay\Protocol\Models\Anketa
 */
interface AnketaAnswer extends Arrayable
{
    /**
     * Get parent model ID
     *
     * @return string
     */
    public function getAnketaId(): string;

    /**
     * Get answers
     *
     * @return array
     */
    public function getAnswers(): array;
}