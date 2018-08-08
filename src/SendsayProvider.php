<?php namespace professionalweb\sendsay;

use Illuminate\Support\ServiceProvider;
use professionalweb\sendsay\services\Anketa;
use professionalweb\sendsay\services\Member;
use professionalweb\sendsay\services\Sendsay;
use professionalweb\sendsay\protocol\SendsayProtocol;
use professionalweb\sendsay\interfaces\Sendsay as ISendsay;
use professionalweb\sendsay\Protocol\SendsayProtocol as ISendsayProtocol;
use professionalweb\sendsay\interfaces\Protocol\Services\Anketa as IAnketa;
use professionalweb\sendsay\interfaces\Protocol\Services\Member as IMember;

class SendsayProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->app->register(ISendsay::class, Sendsay::class);
        $this->app->register(IAnketa::class, Anketa::class);
        $this->app->register(IMember::class, Member::class);

        $this->app->register(ISendsayProtocol::class, function () {
            return new SendsayProtocol(config('sendsay.api-key'));
        });
    }
}