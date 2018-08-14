<?php namespace professionalweb\sendsay\interfaces\Protocol\Models\Anketa;

use Illuminate\Contracts\Support\Arrayable;

/**
 * Interface for anketa's question
 * @package professionalweb\sendsay\interfaces\Protocol\Models\Anketa
 */
interface AnketaQuestion extends Arrayable
{
    public const DEFAULT_FREE_WIDTH = 256;

    public const TYPE_FREE = 'free';

    public const TYPE_DATETIME = 'dt';

    public const TYPE_DATE = 'd';

    public const TYPE_SINGLE_CHOICE = '1m';

    public const TYPE_MULTIPLE_CHOICE = 'nm';

    public const TYPE_INT = 'int';

    /**
     * Get question id
     *
     * @return string
     */
    public function getId(): string;

    /**
     * Get parent/anketa id
     *
     * @return string
     */
    public function getAnketaId(): string;

    /**
     * Get name/title
     *
     * @return string
     */
    public function getName(): string;

    /**
     * Get question type
     *
     * @return string
     */
    public function getType(): string;

    /**
     * Get available items
     *
     * @return array
     */
    public function getAnswers(): array;
}