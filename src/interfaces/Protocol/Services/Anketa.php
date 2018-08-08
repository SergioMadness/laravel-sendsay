<?php namespace professionalweb\sendsay\interfaces\Protocol\Services;

use professionalweb\sendsay\interfaces\Protocol\Models\Anketa\Anketa as AnketaModel;

/**
 * Interface for service to work with anketas
 * @package professionalweb\sendsay\Protocol\Services
 */
interface Anketa
{
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
     * @return bool
     */
    public function delete(AnketaModel $anketa): bool;
}
