<?php namespace professionalweb\sendsay\interfaces;

use professionalweb\sendsay\interfaces\Protocol\Services\Anketa;
use professionalweb\sendsay\interfaces\Protocol\Services\AnketaQuestion;
use professionalweb\sendsay\interfaces\Protocol\Services\Member;

/**
 * Interface for main Sendsay service
 * @package professionalweb\sendsay\interfaces
 */
interface Sendsay
{
    /**
     * Get service to work with members
     *
     * @return Member
     */
    public function members(): Member;

    /**
     * Get service to work with anketas
     *
     * @return Anketa
     */
    public function anketas(): Anketa;

    /**
     * Get service to work with questions for specified anketa
     *
     * @param Anketa $anketa
     *
     * @return AnketaQuestion
     */
    public function questions(Anketa $anketa): AnketaQuestion;
}