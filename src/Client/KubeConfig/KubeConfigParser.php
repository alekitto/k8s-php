<?php

declare(strict_types=1);

namespace Kcs\K8s\Client\KubeConfig;

use Kcs\K8s\Client\KubeConfig\Model\Cluster;
use Kcs\K8s\Client\KubeConfig\Model\Context;
use Kcs\K8s\Client\KubeConfig\Model\User;
use Symfony\Component\Yaml\Yaml;

use function function_exists;
use function yaml_parse;

readonly class KubeConfigParser
{
    /**
     * Parses the string kubeconfig and returns it as an object.
     *
     * @param string $config The string contents of a ~/.kube/config
     */
    public function parse(string $config): KubeConfig
    {
        $data = function_exists('yaml_parse') ? yaml_parse($config) : Yaml::parse($config);

        $clusters = [];
        if (isset($data['clusters'])) {
            $clusters = $this->parseClusters($data['clusters']);
            unset($data['clusters']);
        }

        $contexts = [];
        if (isset($data['contexts'])) {
            $contexts = $this->parseContexts($data['contexts']);
            unset($data['contexts']);
        }

        $users = [];
        if (isset($data['users'])) {
            $users = $this->parseUsers($data['users']);
            unset($data['users']);
        }

        return new KubeConfig(
            $data,
            $clusters,
            $contexts,
            $users,
        );
    }

    /** @return array<int, Cluster> */
    private function parseClusters(array $clustersYaml): array
    {
        $clusters = [];

        foreach ($clustersYaml as $clusterYaml) {
            $clusters[] = new Cluster($clusterYaml);
        }

        return $clusters;
    }

    /** @return array<int, Context> */
    private function parseContexts(array $contextsYaml): array
    {
        $contexts = [];

        foreach ($contextsYaml as $contextYaml) {
            $contexts[] = new Context($contextYaml);
        }

        return $contexts;
    }

    /** @return array<int, User> */
    private function parseUsers(array $usersYaml): array
    {
        $users = [];

        foreach ($usersYaml as $userYaml) {
            $users[] = new User($userYaml);
        }

        return $users;
    }
}
