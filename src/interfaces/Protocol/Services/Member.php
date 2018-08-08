<?php namespace professionalweb\sendsay\interfaces\Protocol\Services;

use professionalweb\sendsay\interfaces\Protocol\Models\Member\Member as IMemberModel;

/**
 * Interface for service to work with members
 * @package professionalweb\sendsay\Protocol\Services
 */
interface Member
{
    public const METHOD_SAVE = 'member.set';

    public const METHOD_EXISTS = 'member.exists';

    public const METHOD_FIND = 'member.find';

    public const METHOD_LIST = 'member.list';

    public const METHOD_GET = 'member.get';

    public const METHOD_DELETE = 'member.delete';

    /**
     * Save member
     *
     * @param IMemberModel $member
     *
     * @return IMemberModel
     */
    public function save(IMemberModel $member): IMemberModel;

    /**
     * Check member exists
     *
     * @param string $email
     *
     * @return bool
     */
    public function exists(string $email): bool;

    /**
     * Find members by email
     *
     * @param string $email
     *
     * @return array
     */
    public function find(string $email): array;

    /**
     * Get members
     *
     * @return array
     */
    public function all(): array;

    /**
     * Get member by email
     *
     * @param string $email
     *
     * @return IMemberModel
     */
    public function get(string $email): IMemberModel;

    /**
     * Delete member
     *
     * @param IMemberModel $member
     *
     * @return IMemberModel
     */
    public function delete(IMemberModel $member): self;
}