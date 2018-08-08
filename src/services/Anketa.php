<?php namespace professionalweb\sendsay\services;

use professionalweb\sendsay\interfaces\Protocol\Services\Anketa as IAnketa;
use professionalweb\sendsay\interfaces\Protocol\Models\Anketa\Anketa as AnketaModel;

/**
 * Service to work with anketas
 * @package professionalweb\sendsay\services
 */
class Anketa extends Service implements IAnketa
{

    /**
     * Save anketa
     *
     * @param AnketaModel $anketa
     *
     * @return AnketaModel
     */
    public function save(AnketaModel $anketa): AnketaModel
    {
        // TODO: Implement save() method.
    }

    /**
     * Get all anketas
     *
     * @return array
     */
    public function all(): array
    {
        // TODO: Implement all() method.
    }

    /**
     * Get anketa by id
     *
     * @param string $id
     *
     * @return AnketaModel
     */
    public function get(string $id): AnketaModel
    {
        // TODO: Implement get() method.
    }

    /**
     * Delete anketa
     *
     * @param AnketaModel $anketa
     *
     * @return bool
     */
    public function delete(AnketaModel $anketa): bool
    {
        // TODO: Implement delete() method.
    }
}