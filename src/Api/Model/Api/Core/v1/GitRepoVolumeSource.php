<?php

declare(strict_types=1);

namespace Kcs\K8s\Api\Model\Api\Core\v1;

use Kcs\K8s\Attribute as Kubernetes;

/**
 * Represents a volume that is populated with the contents of a git repository. Git repo volumes do not
 * support ownership management. Git repo volumes support SELinux relabeling.
 *
 * DEPRECATED: GitRepo is deprecated. To provision a container with a git repo, mount an EmptyDir into
 * an InitContainer that clones the repo using git, then mount the EmptyDir into the Pod's container.
 */
class GitRepoVolumeSource
{
    #[Kubernetes\Attribute('directory')]
    protected string|null $directory = null;

    #[Kubernetes\Attribute('repository', required: true)]
    protected string $repository;

    #[Kubernetes\Attribute('revision')]
    protected string|null $revision = null;

    public function __construct(string $repository)
    {
        $this->repository = $repository;
    }

    /**
     * directory is the target directory name. Must not contain or start with '..'.  If '.' is supplied,
     * the volume directory will be the git repository.  Otherwise, if specified, the volume will contain
     * the git repository in the subdirectory with the given name.
     */
    public function getDirectory(): string|null
    {
        return $this->directory;
    }

    /**
     * directory is the target directory name. Must not contain or start with '..'.  If '.' is supplied,
     * the volume directory will be the git repository.  Otherwise, if specified, the volume will contain
     * the git repository in the subdirectory with the given name.
     *
     * @return static
     */
    public function setDirectory(string $directory): static
    {
        $this->directory = $directory;

        return $this;
    }

    /**
     * repository is the URL
     */
    public function getRepository(): string
    {
        return $this->repository;
    }

    /**
     * repository is the URL
     *
     * @return static
     */
    public function setRepository(string $repository): static
    {
        $this->repository = $repository;

        return $this;
    }

    /**
     * revision is the commit hash for the specified revision.
     */
    public function getRevision(): string|null
    {
        return $this->revision;
    }

    /**
     * revision is the commit hash for the specified revision.
     *
     * @return static
     */
    public function setRevision(string $revision): static
    {
        $this->revision = $revision;

        return $this;
    }
}
