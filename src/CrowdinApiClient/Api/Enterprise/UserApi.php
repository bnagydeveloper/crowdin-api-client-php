<?php

namespace CrowdinApiClient\Api\Enterprise;

use CrowdinApiClient\Api\AbstractApi;
use CrowdinApiClient\Model\Enterprise\ProjectTeamMemberAddedStatistics;
use CrowdinApiClient\Model\Enterprise\User;
use CrowdinApiClient\ModelCollection;

/**
 * Class UserApi
 * @package Crowdin\Api
 */
class UserApi extends AbstractApi
{
    /**
     * Add Project Team Member
     * @link https://support.crowdin.com/enterprise/api/#operation/api.projects.members.post API Documentation
     *
     * @param int $projectId
     * @param array $data
     * @return ProjectTeamMemberAddedStatistics
     */
    public function addProjectTeamMember(int $projectId, array $data): ProjectTeamMemberAddedStatistics
    {
        return $this->_post(sprintf('projects/%d/members', $projectId), ProjectTeamMemberAddedStatistics::class, $data);
    }

    /**
     * List Users
     * @link https://support.crowdin.com/enterprise/api/#operation/api.users.getMany API Documentation
     *
     * @param array $params
     * @return ModelCollection
     */
    public function list(array $params = []): ModelCollection
    {
        return $this->_list('users', User::class, $params);
    }

    /**
     * Get User Info
     * @link https://support.crowdin.com/enterprise/api/#operation/api.users.getById API Documentation
     *
     * @param int $userId
     * @return User|null
     */
    public function get(int $userId): ?User
    {
        return $this->_get('users/' . $userId, User::class);
    }

    /**
     * Get Authenticated User
     * @link https://support.crowdin.com/enterprise/api/#operation/api.user.get API Documentation
     *
     * @return \CrowdinApiClient\Model\User|null
     */
    public function getAuthenticatedUser(): ?User
    {
        return $this->_get('user', User::class);
    }
}
