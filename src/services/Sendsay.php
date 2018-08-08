<?php namespace professionalweb\sendsay\services;

use professionalweb\sendsay\interfaces\Sendsay as ISendsay;
use professionalweb\sendsay\interfaces\Protocol\Services\Anketa;
use professionalweb\sendsay\interfaces\Protocol\Services\Member;

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
}