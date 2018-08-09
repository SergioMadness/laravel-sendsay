<?php namespace professionalweb\sendsay\services;

use professionalweb\sendsay\interfaces\Sendsay as ISendsay;
use professionalweb\sendsay\interfaces\Protocol\Services\Anketa;
use professionalweb\sendsay\interfaces\Protocol\Services\Member;
use professionalweb\sendsay\interfaces\Protocol\Services\AnketaQuestion;
use professionalweb\sendsay\interfaces\Protocol\Models\Anketa\Anketa as IAnketaModel;

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
     * @param Anketa $anketa
     *
     * @return AnketaQuestion
     */
    public function questions(IAnketaModel $anketa): AnketaQuestion
    {
        // TODO: Implement questions() method.
    }
}