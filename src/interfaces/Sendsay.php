<?php namespace professionalweb\sendsay\interfaces;

use professionalweb\sendsay\Protocol\Services\Anketa;
use professionalweb\sendsay\Protocol\Services\Member;

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