<?php namespace professionalweb\sendsay\models\Member;

use professionalweb\sendsay\interfaces\Protocol\Models\Anketa\Anketa;
use professionalweb\sendsay\interfaces\Protocol\Models\Anketa\AnketaAnswer as IAnketaAnswer;

/**
 * Answers to anketa questions
 * @package professionalweb\sendsay\models\Member
 */
class AnketaAnswer implements IAnketaAnswer
{
    /**
     * @var Anketa
     */
    private $anketaId;

    /**
     * Answers
     *
     * @var array
     */
    private $answers = [];

    /**
     * Set anketa id
     *
     * @param string $id
     *
     * @return AnketaAnswer
     */
    public function setAnketaId(string $id): self
    {
        $this->anketaId = $id;

        return $this;
    }

    /**
     * Get parent model
     *
     * @return string
     */
    public function getAnketaId(): string
    {
        return $this->anketaId;
    }

    /**
     * Add single answer
     *
     * @param string $questionId
     * @param string $answerValue
     *
     * @return AnketaAnswer
     */
    public function addAnswer(string $questionId, string $answerValue): self
    {
        $this->answers[$questionId] = $answerValue;

        return $this;
    }

    /**
     * Set answer
     *
     * @param array $answers
     *
     * @return AnketaAnswer
     */
    public function setAnswers(array $answers): self
    {
        $this->answers = $answers;

        return $this;
    }

    /**
     * Get answers
     *
     * @return array
     */
    public function getAnswers(): array
    {
        return $this->answers;
    }

    /**
     * Get the instance as an array.
     *
     * @return array
     */
    public function toArray()
    {
        return $this->getAnswers();
    }
}