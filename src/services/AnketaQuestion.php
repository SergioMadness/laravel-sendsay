<?php namespace professionalweb\sendsay\services;

use professionalweb\sendsay\interfaces\Protocol\Models\Anketa\Anketa;
use professionalweb\sendsay\interfaces\Protocol\Services\Anketa\AnketaQuestion as IAnketaQuestion;
use professionalweb\sendsay\interfaces\Protocol\Models\Anketa\AnketaQuestion as IAnketaQuestionModel;

/**
 * Service to work with anketa's questions
 * @package professionalweb\sendsay\services
 */
class AnketaQuestion extends Service implements IAnketaQuestion
{
    /**
     * @var Anketa
     */
    private $anketa;

    /**
     * Set parent anketa
     *
     * @param Anketa $anketa
     *
     * @return IAnketaQuestion
     */
    public function setAnketa(Anketa $anketa): IAnketaQuestion
    {
        $this->anketa = $anketa;

        return $this;
    }

    /**
     * Save questions
     *
     * @param IAnketaQuestionModel $anketaQuestion
     *
     * @return IAnketaQuestionModel
     * @throws \Exception
     */
    public function save(IAnketaQuestionModel $anketaQuestion): IAnketaQuestionModel
    {
        $data = $anketaQuestion->toArray();
        $data['anketa.id'] = $this->anketa->getId();

        if ($this->anketa->hasQuestions($anketaQuestion->getId())) {
            $response = $this->getProtocol()->call(self::METHOD_SET, $data);
        } else {
            $response = $this->getProtocol()->call(self::METHOD_CREATE, $data);
        }

        if ($response->isError()) {
            throw new \Exception($response->getError()[0]->getMessage());
        }

        return $anketaQuestion;
    }

    /**
     * Delete questions
     *
     * @param IAnketaQuestionModel $anketaQuestion
     *
     * @return IAnketaQuestion
     * @throws \Exception
     */
    public function delete(IAnketaQuestionModel $anketaQuestion): IAnketaQuestion
    {
        $response = $this->getProtocol()->call(self::METHOD_DELETE, [
            'anketa.id' => $this->anketa->getId(),
            'id'        => $anketaQuestion->getId(),
        ]);

        if ($response->isError()) {
            throw new \Exception($response->getError()[0]->getMessage());
        }

        $this->anketa->removeQuestion($anketaQuestion->getId());

        return $this;
    }
}