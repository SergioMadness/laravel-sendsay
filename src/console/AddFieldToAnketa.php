<?php namespace professionalweb\sendsay\console;

use Illuminate\Console\Command;
use professionalweb\sendsay\services\Sendsay;
use professionalweb\sendsay\models\Anketa\Anketa;
use professionalweb\sendsay\models\Anketa\AnketaQuestion;

class AddFieldToAnketa extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'sendsay:add-question';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Add question to anketa';

    public function handle(Sendsay $service)
    {
        $anketaId = $this->ask('Anketa id');

        do {
            $questionId = $this->ask('Question id');
            $questionType = $this->choice('Question type', ['free', 'dt', '1m', 'nm', 'int'], 0);
            $questionDateType = null;
            if ($questionType === 'dt') {
                $questionDateType = $this->choice('Date type', ['ys', 'ym', 'yh', 'yd'], 0);
            }
            $answerWidth = null;
            if ($questionType === 'free') {
                $answerWidth = $this->ask('Field width', 256);
            }
            $questionName = $this->ask('Question');

            $service->questions(new Anketa([
                'id' => $anketaId,
            ]))->save(new AnketaQuestion([
                'id'        => $questionId,
                'name'      => $questionName,
                'type'      => $questionType,
                'width'     => $answerWidth,
                'dtsubtype' => $questionDateType,
            ]));
        } while ($this->confirm('Another question?', true));
    }
}