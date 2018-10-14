<?php
/**
 * Created by Andrew Ivchenkov <and.ivchenkov@gmail.com>
 * Date: 06.10.18
 */

namespace BookingCom\Models\Hotel;

use BookingCom\Models\AbstractModel;
use BookingCom\Models\Hotel\Room\Facility;
use BookingCom\Models\Hotel\Room\Info;
use BookingCom\Models\Hotel\Room\Photo;

class Room extends AbstractModel
{

    /**
     * @var int
     */
    private $id;
    /**
     * @var Info|null
     */
    private $info;

    /** @var Photo[] */
    private $photos;

    /**
     * @var Facility[]
     */
    private $facilities;
    /**
     * @var null|string
     */
    private $name;
    /**
     * @var null|string
     */
    private $description;

    public function __construct(
        int $id,
        ?string $name,
        ?string $description,
        ?Info $info,
        array $photos,
        array $facilities
    ) {
        $this->id = $id;
        $this->name = $name;
        $this->description = $description;
        $this->info = $info;
        $this->photos = $photos;
        $this->facilities = $facilities;
    }

    public static function fromArray(array $array): Room
    {
        $name = $array['room_name'] ?? null;
        $description = $array['room_description'] ?? null;
        $roomInfo = self::makeChildFromArray($array, Info::class, 'room_info');
        $photos = self::makeChildrenFromArray($array, Photo::class, 'room_photos');
        $facilities = self::makeChildrenFromArray($array, Facility::class, 'room_facilities');
        return new self($array['room_id'], $name, $description, $roomInfo, $photos, $facilities);
    }

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @return \BookingCom\Models\Hotel\Room\Info|null
     */
    public function getInfo(): ?Info
    {
        return $this->info;
    }

    public function getPhotos(): array
    {
        return $this->photos;
    }

    public function getFacilities(): array
    {
        return $this->facilities;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getDescription(): string
    {
        return $this->description;
    }
}
