<?php namespace professionalweb\sendsay\services;

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
     */
    public function save(IMemberModel $member): IMemberModel
    {
        $response = $this->getProtocol()->call(self::METHOD_SAVE, $member->toArray());

        return $member;
    }

    /**
     * Check member exists
     *
     * @param string $email
     *
     * @return bool
     */
    public function exists(string $email): bool
    {
        $response = $this->getProtocol()->call(self::METHOD_EXISTS, [
            'email' => $email,
        ]);

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

        if (!$response->isError()) {
            foreach ($response->getData()['list'] as $member) {
                $result[] = null;
            }

            return $result;
        }
        throw new \Exception($response->getError()[0]->getMessage);
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

        if (!$response->isError()) {
            return;
        }
        throw new \Exception($response->getError()[0]->getMessage());
    }

    /**
     * Delete member
     *
     * @param IMemberModel $member
     *
     * @return bool
     */
    public function delete(IMemberModel $member): bool
    {
        $response = $this->getProtocol()->call(self::METHOD_DELETE, [
            'email' => $member->getEmail(),
        ]);

        return !$response->isError();
    }
}