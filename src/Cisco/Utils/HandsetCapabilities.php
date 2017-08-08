<?php
/**
 * Project: cisco-ip-phone-services
 * Created: 07/08/2017
 * Copyright 2017 Andrew O'Rourke
 */

namespace Cisco\Utils;


class HandsetCapabilities
{
    /**
     * @var int The width of the IP phone's display, in pixels
     */
    private $displayWidth = 32;
    /**
     * @var int The height of the IP phone's display, in pixels
     */
    private $displayHeight = 32;
    /**
     * @var int The depth of the IP phone's display, in bits
     */
    private $displayDepth = 2;
    /**
     * @var string The color space of the IP phone's display. Either DISPLAY_SPACE_GREYSCALE or DISPLAY_SPACE_COLOR
     */
    private $displaySpace = null;

    /**
     * @var string The model name of the IP phone
     */
    private $modelName = "undefined";

    /**
     * Constants
     */
    const DISPLAY_HEADER = 'HTTP_X_CISCOIPPHONEDISPLAY';
    const DISPLAY_SPACE_GREYSCALE = 'Greyscale';
    const DISPLAY_SPACE_COLOR = 'Color';
    const MODEL_HEADER = 'HTTP_X_CISCOIPPHONEMODELNAME';

    /**
     * HandsetCapabilities constructor.
     */
    public function __construct()
    {
        if (array_key_exists(self::DISPLAY_HEADER, $_SERVER)) {
            $displayHeader = explode(',', filter_input(INPUT_SERVER, self::DISPLAY_HEADER));
            $this->displayWidth = (int)$displayHeader[0];
            $this->displayHeight = (int)$displayHeader[1];
            $this->displayDepth = (int)$displayHeader[2];
            $this->displaySpace = $displayHeader[3] === 'G' ? self::DISPLAY_SPACE_GREYSCALE : self::DISPLAY_SPACE_COLOR;
        }
        if (array_key_exists(self::MODEL_HEADER, $_SERVER)) {
            $this->modelName = filter_input(INPUT_SERVER, self::MODEL_HEADER);
        }
    }

    /**
     * @return int
     */
    public function getDisplayWidth()
    {
        return $this->displayWidth;
    }

    /**
     * @return int
     */
    public function getDisplayHeight()
    {
        return $this->displayHeight;
    }

    /**
     * @return int
     */
    public function getDisplayDepth()
    {
        return $this->displayDepth;
    }

    /**
     * @return int
     */
    public function getDisplaySpace()
    {
        return $this->displaySpace;
    }

    /**
     * @return string
     */
    public function getModelName()
    {
        return $this->modelName;
    }
}