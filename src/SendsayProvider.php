<?php namespace professionalweb\sendsay;

use Illuminate\Support\ServiceProvider;
use professionalweb\sendsay\services\Anketa;
use professionalweb\sendsay\services\Member;
use professionalweb\sendsay\services\Sendsay;
use professionalweb\sendsay\services\AnketaQuestion;
use professionalweb\sendsay\protocol\SendsayProtocol;
use professionalweb\sendsay\console\AddFieldToAnketa;
use professionalweb\sendsay\interfaces\Sendsay as ISendsay;
use professionalweb\sendsay\interfaces\Protocol\Services\Anketa\Anketa as IAnketa;
use professionalweb\sendsay\interfaces\Protocol\Services\Member\Member as IMember;
use professionalweb\sendsay\interfaces\Protocol\SendsayProtocol as ISendsayProtocol;
use professionalweb\sendsay\interfaces\Protocol\Services\Anketa\AnketaQuestion as IAnketaQuestion;

class SendsayProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->app->bind(IAnketa::class, Anketa::class);
        $this->app->bind(IMember::class, Member::class);
        $this->app->bind(ISendsay::class, Sendsay::class);
        $this->app->bind(IAnketaQuestion::class, AnketaQuestion::class);

        $this->app->bind(ISendsayProtocol::class, function () {
            return new SendsayProtocol(config('sendsay.api-key'));
        });

        $this->commands([AddFieldToAnketa::class]);
    }
}