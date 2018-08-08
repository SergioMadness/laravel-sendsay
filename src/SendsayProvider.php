<?php namespace professionalweb\sendsay;

use Illuminate\Support\ServiceProvider;
use professionalweb\sendsay\services\Anketa;
use professionalweb\sendsay\services\Member;
use professionalweb\sendsay\services\Sendsay;
use professionalweb\sendsay\protocol\SendsayProtocol;
use professionalweb\sendsay\interfaces\Sendsay as ISendsay;
use professionalweb\sendsay\interfaces\Protocol\Services\Anketa as IAnketa;
use professionalweb\sendsay\interfaces\Protocol\Services\Member as IMember;
use professionalweb\sendsay\interfaces\Protocol\SendsayProtocol as ISendsayProtocol;

class SendsayProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->app->bind(ISendsay::class, Sendsay::class);
        $this->app->bind(IAnketa::class, Anketa::class);
        $this->app->bind(IMember::class, Member::class);

        $this->app->bind(ISendsayProtocol::class, function () {
            return new SendsayProtocol(config('sendsay.api-key'));
        });
    }
}