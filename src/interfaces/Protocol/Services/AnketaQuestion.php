<?php namespace professionalweb\sendsay\interfaces\Protocol\Services;

use professionalweb\sendsay\interfaces\Protocol\Models\Anketa\Anketa;
use professionalweb\sendsay\interfaces\Protocol\Models\Anketa\AnketaQuestion as IAnketaQuestionModel;

/**
 * Interface for service to work with anketa questions
 * @package professionalweb\sendsay\interfaces\Protocol\Services
 */
interface AnketaQuestion
{
    public const METHOD_CREATE = 'anketa.quest.add';

    public const METHOD_SET = 'anketa.quest.set';

    public const METHOD_DELETE = 'anketa.quest.delete';

    /**
     * Set parent anketa
     *
     * @param Anketa $anketa
     *
     * @return AnketaQuestion
     */
    public function setAnketa(Anketa $anketa): self;

    /**
     * Save questions
     *
     * @param IAnketaQuestionModel $anketaQuestion
     *
     * @return IAnketaQuestionModel
     */
    public function save(IAnketaQuestionModel $anketaQuestion): IAnketaQuestionModel;

    /**
     * Delete questions
     *
     * @param IAnketaQuestionModel $anketaQuestion
     *
     * @return IAnketaQuestionModel
     */
    public function delete(IAnketaQuestionModel $anketaQuestion): self;
}