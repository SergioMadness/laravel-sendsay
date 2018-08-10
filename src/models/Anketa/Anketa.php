<?php namespace professionalweb\sendsay\models\Anketa;

use professionalweb\sendsay\interfaces\Protocol\Models\Anketa\AnketaQuestion;
use professionalweb\sendsay\interfaces\Protocol\Models\Anketa\Anketa as IAnketa;

/**
 * Anketa
 * @package professionalweb\sendsay\models\Anketa
 */
class Anketa implements IAnketa
{
    /**
     * @var array
     */
    private $data;

    /**
     * @var AnketaQuestion[]
     */
    private $questions = [];

    public function __construct(array $data = [])
    {
        $this->data = $data;
    }

    /**
     * Get anketa ID
     *
     * @return string
     */
    public function getId(): string
    {
        return $this->data['id'] ?? '';
    }

    /**
     * Get anketa name
     *
     * @return string
     */
    public function getName(): string
    {
        return $this->data['name'] ?? '';
    }

    /**
     * Get the instance as an array.
     *
     * @return array
     */
    public function toArray()
    {
        $data = [
            'name' => $this->getName(),
        ];

        if (!empty($id = $this->getId())) {
            $data['id'] = $id;
        }

        return $data;
    }

    /**
     * Set questions
     *
     * @param array $questions
     *
     * @return Anketa
     */
    public function setQuestions(array $questions): self
    {
        $this->questions = $questions;

        return $this;
    }

    /**
     * Get available questions
     *
     * @return AnketaQuestion[]
     */
    public function getQuestions(): array
    {
        return [];
    }

    /**
     * Check anketa has question
     *
     * @param string $id
     *
     * @return bool
     */
    public function hasQuestions(string $id): bool
    {
        $questions = $this->getQuestions();

        foreach ($questions as $question) {
            if ($question->getId() === $id) {
                return true;
            }
        }

        return false;
    }

    /**
     * Set Sendsay id
     *
     * @param string $id
     *
     * @return IAnketa
     */
    public function setId(string $id): IAnketa
    {
        $this->data['id'] = $id;

        return $this;
    }
}