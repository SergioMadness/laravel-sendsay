<?php namespace professionalweb\sendsay\services;

use professionalweb\sendsay\models\Member\Member as MemberModel;
use professionalweb\sendsay\interfaces\Protocol\Services\Member as IMemberService;
use professionalweb\sendsay\interfaces\Protocol\Models\Member\Member as IMemberModel;

/**
 * Wrapper for member service
 * @package professionalweb\sendsay\services
 */
class Member extends Service implements IMemberService
{
    /**
     * Save member
     *
     * @param IMemberModel $member
     *
     * @return IMemberModel
     * @throws \Exception
     */
    public function save(IMemberModel $member): IMemberModel
    {
        $data = $member->toArray();

        if (isset($data['datakey'])) {
            $dataWithDataKey = $data;
            if (isset($dataWithDataKey['obj'])) {
                unset($dataWithDataKey['obj']);
            }
            $response = $this->getProtocol()->call(self::METHOD_SAVE, $dataWithDataKey);
        }
        if ($response->isError()) {
            throw new \Exception($response->getError()[0]->getMessage());
        }
        if (isset($data['obj']) && !empty($data['obj'])) {
            if (isset($data['datakey'])) {
                unset($data['datakey']);
            }
            $response = $this->getProtocol()->call(self::METHOD_SAVE, $data);
        }
        if ($response->isError()) {
            throw new \Exception($response->getError()[0]->getMessage());
        }

        return $member;
    }

    /**
     * Check member exists
     *
     * @param string $email
     *
     * @return bool
     * @throws \Exception
     */
    public function exists(string $email): bool
    {
        $response = $this->getProtocol()->call(self::METHOD_EXISTS, [
            'email' => $email,
        ]);

        if ($response->isError()) {
            throw new \Exception($response->getError()[0]->getMessage());
        }

        return !$response->isError() && $response->getData()['list'][$email] === 1;
    }

    /**
     * Find members by email
     *
     * @param string $email
     *
     * @return array
     * @throws \Exception
     */
    public function find(string $email): array
    {
        $result = [];
        $response = $this->getProtocol()->call(self::METHOD_FIND, [
            'email' => $email,
        ]);

        if ($response->isError()) {
            throw new \Exception($response->getError()[0]->getMessage());
        }
        foreach ($response->getData()['list'] as $member) {
            $result[] = null;
        }

        return $result;
    }

    /**
     * Get member by email
     *
     * @param string $email
     *
     * @return IMemberModel
     * @throws \Exception
     */
    public function get(string $email): IMemberModel
    {
        $response = $this->getProtocol()->call(self::METHOD_GET, [
            'email' => $email,
        ]);

        if ($response->isError()) {
            throw new \Exception($response->getError()[0]->getMessage());
        }

        return new MemberModel($response->getData());
    }

    /**
     * Delete member
     *
     * @param IMemberModel $member
     *
     * @return IMemberService
     * @throws \Exception
     */
    public function delete(IMemberModel $member): IMemberService
    {
        $response = $this->getProtocol()->call(self::METHOD_DELETE, [
            'email' => $member->getEmail(),
        ]);

        if ($response->isError()) {
            throw new \Exception($response->getError()[0]->getMessage());
        }

        return $this;
    }

    /**
     * Get members
     *
     * @return array
     * @throws \Exception
     */
    public function all(): array
    {
        $response = $this->getProtocol()->call(self::METHOD_LIST, []);

        if ($response->isError()) {
            throw new \Exception($response->getError()[0]->getMessage());
        }

        $result = [];
        foreach ($response->getData()['list'] as $item) {
            $result[] = new MemberModel(['email' => $item]);
        }

        return $result;
    }
}