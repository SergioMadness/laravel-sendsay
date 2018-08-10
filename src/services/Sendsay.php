<?php namespace professionalweb\sendsay\services;

use professionalweb\sendsay\interfaces\Sendsay as ISendsay;
use professionalweb\sendsay\interfaces\Protocol\Services\Anketa;
use professionalweb\sendsay\interfaces\Protocol\Services\Member;
use professionalweb\sendsay\interfaces\Protocol\Services\AnketaAnswers;
use professionalweb\sendsay\interfaces\Protocol\Services\AnketaQuestion;
use professionalweb\sendsay\interfaces\Protocol\Models\Anketa\Anketa as IAnketaModel;
use professionalweb\sendsay\interfaces\Protocol\Models\Member\Member as IMemberModel;

/**
 * Sendsay service
 * @package professionalweb\sendsay\services
 */
class Sendsay implements ISendsay
{

    /**
     * Get service to work with members
     *
     * @return Member
     */
    public function members(): Member
    {
        return app(Member::class);
    }

    /**
     * Get service to work with anketas
     *
     * @return Anketa
     */
    public function anketas(): Anketa
    {
        return app(Anketa::class);
    }

    /**
     * Get service to work with questions for specified anketa
     *
     * @param IAnketaModel $anketa
     *
     * @return AnketaQuestion
     */
    public function questions(IAnketaModel $anketa): AnketaQuestion
    {
        return app(AnketaQuestion::class)->setAnketa($anketa);
    }


    /**
     * Create service to work with member's answers
     *
     * @param IMemberModel $member
     * @param IAnketaModel $anketa
     *
     * @return AnketaAnswers
     */
    public function answers(IMemberModel $member, IAnketaModel $anketa): AnketaAnswers
    {
        return app(AnketaAnswers::class)->setAnketa($anketa)->setMember($member);
    }
}