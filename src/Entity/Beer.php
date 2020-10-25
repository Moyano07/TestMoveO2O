<?php


namespace App\Entity;



use Symfony\Component\Serializer\Annotation\Groups;

class Beer
{
    /**
     * @var int
     * @Groups({"list","detail"})
     */
    public $id;

    /**
     * @var string
     * @Groups({"list","detail"})
     */
    public $name;

    /**
     * @var string
     * @Groups({"list","detail"})
     */
    public $description;

    /**
     * @var string
     * @Groups({"detail"})
     */
    public $imageUrl;

    /**
     * @var string
     *@Groups({"detail"})
     */
    public $tagline;

    /**
     * @var string
     * @Groups({"detail"})
     */
    public $firstBrewed;


    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @param int $id
     */
    public function setId(int $id): void
    {
        $this->id = $id;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $name
     */
    public function setName(string $name): void
    {
        $this->name = $name;
    }

    /**
     * @return string
     */
    public function getDescription(): string
    {
        return $this->description;
    }

    /**
     * @param string $description
     */
    public function setDescription(string $description): void
    {
        $this->description = $description;
    }

    /**
     * @return string
     */
    public function getImageUrl(): string
    {
        return $this->imageUrl;
    }

    /**
     * @param string $imageUrl
     */
    public function setImageUrl(string $imageUrl): void
    {
        $this->imageUrl = $imageUrl;
    }

    /**
     * @return string
     */
    public function getTagline(): string
    {
        return $this->tagline;
    }

    /**
     * @param string $tagline
     */
    public function setTagline(string $tagline): void
    {
        $this->tagline = $tagline;
    }

    /**
     * @return string
     */
    public function getFirstBrewed(): string
    {
        return $this->firstBrewed;
    }

    /**
     * @param string $firstBrewed
     */
    public function setFirstBrewed(string $firstBrewed): void
    {
        $this->firstBrewed = $firstBrewed;
    }


}