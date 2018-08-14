<?php namespace professionalweb\sendsay\models\Anketa;

use professionalweb\sendsay\interfaces\Protocol\Models\Anketa\AnketaQuestion as IAnketaQuestion;

/**
 * Anketa's question
 * @package professionalweb\sendsay\models\Anketa
 */
class AnketaQuestion implements IAnketaQuestion
{
    /**
     * @var array
     */
    private $data;

    public function __construct(array $data = [])
    {
        $this->data = $data;
    }

    /**
     * Get question id
     *
     * @return string
     */
    public function getId(): string
    {
        return $this->data['id'] ?? '';
    }

    /**
     * Get parent/anketa id
     *
     * @return string
     */
    public function getAnketaId(): string
    {
        return $this->data['anketa.id'] ?? '';
    }

    /**
     * Get name/title
     *
     * @return string
     */
    public function getName(): string
    {
        return $this->data['name'] ?? '';
    }

    /**
     * Get question type
     *
     * @return string
     */
    public function getType(): string
    {
        return $this->data['type'] ?? '';
    }

    /**
     * Get available items
     *
     * @return array
     */
    public function getAnswers(): array
    {
        return $this->data['answers'] ?? [];
    }

    /**
     * Get the instance as an array.
     *
     * @return array
     */
    public function toArray()
    {
        $type = $this->getType();

        $questionData = [
            'id'   => $this->getId(),
            'name' => $this->getName(),
            'type' => $type,
        ];

        if ($type === self::TYPE_MULTIPLE_CHOICE || $type === self::TYPE_SINGLE_CHOICE) {
            $questionData['answers'] = $this->getAnswers();
        }
        if ($type === self::TYPE_FREE) {
            $questionData['width'] = self::DEFAULT_FREE_WIDTH;
        }
        if ($type === self::TYPE_DATETIME) {
            $questionData['dtsubtype'] = 'ys';
        }
        if ($type === self::TYPE_DATE) {
            $questionData['dtsubtype'] = 'yd';
            $questionData['type'] = self::TYPE_DATETIME;
        }

        return [
            'anketa.id' => $this->getAnketaId(),
            'obj'       => $questionData,
        ];
    }
}