<?php namespace professionalweb\sendsay\services;

use professionalweb\sendsay\models\Anketa\Anketa as AnketaModel;
use professionalweb\sendsay\interfaces\Protocol\Services\Anketa as IAnketa;
use professionalweb\sendsay\interfaces\Protocol\Models\Anketa\Anketa as IAnketaModel;

/**
 * Service to work with anketas
 * @package professionalweb\sendsay\services
 */
class Anketa extends Service implements IAnketa
{

    /**
     * Save anketa
     *
     * @param IAnketaModel $anketa
     *
     * @return IAnketaModel
     * @throws \Exception
     */
    public function save(IAnketaModel $anketa): IAnketaModel
    {
        if ($this->exists($anketa->getId())) {
            $response = $this->getProtocol()->call(self::METHOD_SAVE, $anketa->toArray());
        } else {
            $response = $this->getProtocol()->call(self::METHOD_CREATE, $anketa->toArray());
        }

        if ($response->isError()) {
            throw new \Exception($response->getError()[0]->getMessage());
        }

        $anketa->setId($response->getData()['id']);

        return $anketa;
    }

    /**
     * Get all anketas
     *
     * @return array
     * @throws \Exception
     */
    public function all(): array
    {
        $response = $this->getProtocol()->call(self::METHOD_LIST);

        if ($response->isError()) {
            throw new \Exception($response->getError()[0]->getMessage());
        }

        $result = [];

        foreach ($response->getData()['list'] as $item) {
            $result[] = new AnketaModel($item);
        }

        return $result;
    }

    /**
     * Get anketa by id
     *
     * @param string $id
     *
     * @return IAnketaModel
     * @throws \Exception
     */
    public function get(string $id): IAnketaModel
    {
        $response = $this->getProtocol()->call(self::METHOD_GET, [
            'id' => $id,
        ]);

        if ($response->isError()) {
            throw new \Exception($response->getError()[0]->getMessage());
        }

        $anketa = new AnketaModel(array_merge([
            'id' => $response->getData()['id'],
        ], $response->getData()['param']));

        return $anketa;
    }

    /**
     * Get Anketa exists
     *
     * @param string $id
     *
     * @return bool
     * @throws \Exception
     */
    public function exists(string $id): bool
    {
        try {
            $this->get($id);

            return true;
        } catch (\Exception $ex) {
            return false;
        }
    }

    /**
     * Delete anketa
     *
     * @param IAnketaModel $anketa
     *
     * @return IAnketa
     * @throws \Exception
     */
    public function delete(IAnketaModel $anketa): IAnketa
    {
        $response = $this->getProtocol()->call(self::METHOD_DELETE, [
            'id' => $anketa->getId(),
        ]);

        if ($response->isError()) {
            throw new \Exception($response->getError()[0]->getMessage());
        }

        return $this;
    }
}