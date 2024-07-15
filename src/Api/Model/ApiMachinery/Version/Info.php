<?php

declare(strict_types=1);

namespace Kcs\K8s\Api\Model\ApiMachinery\Version;

use Kcs\K8s\Attribute as Kubernetes;

/**
 * Info contains versioning information. how we'll want to distribute that information.
 */
class Info
{
    #[Kubernetes\Attribute('buildDate', required: true)]
    protected string $buildDate;

    #[Kubernetes\Attribute('compiler', required: true)]
    protected string $compiler;

    #[Kubernetes\Attribute('gitCommit', required: true)]
    protected string $gitCommit;

    #[Kubernetes\Attribute('gitTreeState', required: true)]
    protected string $gitTreeState;

    #[Kubernetes\Attribute('gitVersion', required: true)]
    protected string $gitVersion;

    #[Kubernetes\Attribute('goVersion', required: true)]
    protected string $goVersion;

    #[Kubernetes\Attribute('major', required: true)]
    protected string $major;

    #[Kubernetes\Attribute('minor', required: true)]
    protected string $minor;

    #[Kubernetes\Attribute('platform', required: true)]
    protected string $platform;

    public function __construct(
        string $buildDate,
        string $compiler,
        string $gitCommit,
        string $gitTreeState,
        string $gitVersion,
        string $goVersion,
        string $major,
        string $minor,
        string $platform,
    ) {
        $this->buildDate = $buildDate;
        $this->compiler = $compiler;
        $this->gitCommit = $gitCommit;
        $this->gitTreeState = $gitTreeState;
        $this->gitVersion = $gitVersion;
        $this->goVersion = $goVersion;
        $this->major = $major;
        $this->minor = $minor;
        $this->platform = $platform;
    }

    public function getBuildDate(): string
    {
        return $this->buildDate;
    }

    /** @return static */
    public function setBuildDate(string $buildDate): static
    {
        $this->buildDate = $buildDate;

        return $this;
    }

    public function getCompiler(): string
    {
        return $this->compiler;
    }

    /** @return static */
    public function setCompiler(string $compiler): static
    {
        $this->compiler = $compiler;

        return $this;
    }

    public function getGitCommit(): string
    {
        return $this->gitCommit;
    }

    /** @return static */
    public function setGitCommit(string $gitCommit): static
    {
        $this->gitCommit = $gitCommit;

        return $this;
    }

    public function getGitTreeState(): string
    {
        return $this->gitTreeState;
    }

    /** @return static */
    public function setGitTreeState(string $gitTreeState): static
    {
        $this->gitTreeState = $gitTreeState;

        return $this;
    }

    public function getGitVersion(): string
    {
        return $this->gitVersion;
    }

    /** @return static */
    public function setGitVersion(string $gitVersion): static
    {
        $this->gitVersion = $gitVersion;

        return $this;
    }

    public function getGoVersion(): string
    {
        return $this->goVersion;
    }

    /** @return static */
    public function setGoVersion(string $goVersion): static
    {
        $this->goVersion = $goVersion;

        return $this;
    }

    public function getMajor(): string
    {
        return $this->major;
    }

    /** @return static */
    public function setMajor(string $major): static
    {
        $this->major = $major;

        return $this;
    }

    public function getMinor(): string
    {
        return $this->minor;
    }

    /** @return static */
    public function setMinor(string $minor): static
    {
        $this->minor = $minor;

        return $this;
    }

    public function getPlatform(): string
    {
        return $this->platform;
    }

    /** @return static */
    public function setPlatform(string $platform): static
    {
        $this->platform = $platform;

        return $this;
    }
}
