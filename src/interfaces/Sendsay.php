<?php namespace professionalweb\sendsay\interfaces;

use professionalweb\sendsay\interfaces\Protocol\Services\Anketa\Anketa;
use professionalweb\sendsay\interfaces\Protocol\Services\Member\Member;
use professionalweb\sendsay\interfaces\Protocol\Services\Anketa\AnketaQuestion;
use professionalweb\sendsay\interfaces\Protocol\Models\Anketa\Anketa as IAnketaModel;

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
}