<?php namespace professionalweb\sendsay\interfaces\Protocol\Services\Anketa;

use professionalweb\sendsay\interfaces\Protocol\Models\Anketa\Anketa as AnketaModel;

/**
 * Interface for service to work with anketas
 * @package professionalweb\sendsay\Protocol\Services
 */
interface Anketa
{
    public const METHOD_LIST = 'anketa.list';

    public const METHOD_GET = 'anketa.get';

    public const METHOD_DELETE = 'anketa.delete';

    public const METHOD_CREATE = 'anketa.create';

    public const METHOD_SAVE = 'anketa.set';

    /**
     * Save anketa
     *
     * @param AnketaModel $anketa
     *
     * @return AnketaModel
     */
    public function save(AnketaModel $anketa): AnketaModel;

    /**
     * Get all anketas
     *
     * @return array
     */
    public function all(): array;

    /**
     * Get anketa by id
     *
     * @param string $id
     *
     * @return AnketaModel
     */
    public function get(string $id): AnketaModel;

    /**
     * Delete anketa
     *
     * @param AnketaModel $anketa
     *
     * @return Anketa
     */
    public function delete(AnketaModel $anketa): self;


    /**
     * Get service to work with questions for specified anketa
     *
     * @param AnketaModel $anketa
     *
     * @return AnketaQuestion
     */
    public function questions(AnketaModel $anketa): AnketaQuestion;
}
