<?php

namespace BookingCom\Models\Room;

use BookingCom\Models\AbstractModel;
use BookingCom\Models\AutoTag;

class Photo extends AbstractModel
{
    public const SIZE_ORIGINAL = 'original';
    public const SIZE_MAX_300 = 'max_300';
    public const SIZE_SQUARE_60 = 'square_60';

    /**
     * @var array
     */
    private $urls;
    /**
     * @var bool
     */
    private $isMain;

    /**
     * @var string[]
     */
    private $tags;

    /**
     * @var AutoTag[]
     */
    private $autoTags;

    /**
     * HotelPhoto constructor.
     * @param array    $urls
     * @param bool     $isMain
     * @param string[] $tags
     * @param array    $autoTags
     */
    public function __construct(bool $isMain, array $urls, array $tags, array $autoTags)
    {
        $this->urls = $urls;
        $this->isMain = $isMain;
        $this->tags = $tags;
        $this->autoTags = $autoTags;
    }

    public static function fromArray(array $array): self
    {
        $urls = [self::SIZE_ORIGINAL => $array['url_original']];

        if (isset($array['url_max300'])) {
            $urls[self::SIZE_MAX_300] = $array['url_max300'];
        }

        if (isset($array['url_square60'])) {
            $urls[self::SIZE_SQUARE_60] = $array['url_square60'];
        }

        $isMain = $array['main_photo'] ?? false;
        $tags = $array['tags'] ?? [];
        $autoTags = self::makeChildrenFromArray($array, AutoTag::class, 'auto_tags');

        return new static($isMain, $urls, $tags, $autoTags);
    }

    public function getUrl($size = self::SIZE_ORIGINAL)
    {
        return $this->urls[$size] ?? null;
    }

    /**
     * @return bool
     */
    public function isMain(): bool
    {
        return $this->isMain;
    }

    /**
     * @return string[]
     */
    public function getTags(): array
    {
        return $this->tags;
    }

    /**
     * @return AutoTag[]
     */
    public function getAutoTags(): array
    {
        return $this->autoTags;
    }
}
