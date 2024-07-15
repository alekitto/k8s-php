<?php

declare(strict_types=1);

namespace Kcs\K8s\ApiGenerator\Github;

use RuntimeException;

use function array_filter;
use function array_reverse;
use function sprintf;
use function usort;
use function version_compare;

readonly class GitTags
{
    /** @param GitTag[] $gitTags */
    public function __construct(private array $gitTags)
    {
    }

    public function getLatestStableTag(string|null $version = null): GitTag
    {
        $gitTags = $this->getAndSortTags();

        // if no version is specified, we only want the latest stable release.
        // If no stable release is found, get the latest recorded.
        foreach ($gitTags as $tag) {
            if ($version === null && $tag->isStable()) {
                return $tag;
            }

            if ($version && $tag->startsWith($version) && $tag->isStable()) {
                return $tag;
            }
        }

        throw new RuntimeException(sprintf(
            'Could not find a tag for version "%s".',
            $version,
        ));
    }

    /** @return GitTag[] */
    public function getStableTags(string|null $ge = null): array
    {
        return array_filter($this->getAndSortTags(), static function (GitTag $tag) use ($ge) {
            if ($ge === null) {
                return $tag->isStable();
            }

            return version_compare($tag->getCommonName(), $ge, 'ge') && $tag->isStable();
        });
    }

    /** @return GitTag[] */
    private function getAndSortTags(): array
    {
        $gitTags = $this->gitTags;

        // We first sort all tags, starting with the latest release
        usort($gitTags, static function (GitTag $tag1, GitTag $tag2): int {
            return version_compare($tag1->getCommonName(), $tag2->getCommonName());
        });

        return array_reverse($gitTags);
    }
}
