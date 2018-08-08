<?php namespace professionalweb\sendsay;

use Illuminate\Support\ServiceProvider;
use professionalweb\sendsay\services\Anketa;
use professionalweb\sendsay\services\Member;
use professionalweb\sendsay\services\Sendsay;
use professionalweb\sendsay\interfaces\Sendsay as ISendsay;
use professionalweb\sendsay\Protocol\Services\Anketa as IAnketa;
use professionalweb\sendsay\Protocol\Services\Member as IMember;

class SendsayProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->app->register(ISendsay::class, Sendsay::class);
        $this->app->register(IAnketa::class, Anketa::class);
        $this->app->register(IMember::class, Member::class);
    }
}