<?php

namespace RocketChatPhp;

class Attachments
{

    /**
     * @var array An array of fields.
     */
    private $fields;

    /**
     * @var string The fallback text, if attachment could not be displayed.
     */
    private $fallback;

    /**
     * @var string The color of the left bar in hex.
     */
    private $color;

    /**
     * Attachments constructor.
     * @param string $fallback
     * @param string $color
     */
    public function __construct($fallback, $color)
    {
        $this->fallback = $fallback;
        $this->color = $color;
    }

    /**
     * Add a field to the attachments list.
     * @param $title
     * @param $value
     * @param bool $short
     */
    public function addField($title, $value, $short = false)
    {
        $this->fields[] = [
            'title' => $title,
            'value' => $value,
            'short' => $short
        ];
    }

    /**
     * Return the array of attachments.
     * @return array
     */
    public function toArray()
    {
        return [[
            'fallback' => $this->fallback,
            'color' => $this->color,
            'fields' => $this->fields
        ]];
    }

}