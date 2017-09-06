<?php
/**
 * Created by PhpStorm.
 * User: jan-ole.foerste
 * Date: 06.09.2017
 * Time: 10:50
 */

namespace Fhp\Segment;


class HKTAN extends AbstractSegment
{
    const NAME = 'HKTAN';
    const VERSION = 6;

    /**
     * HKTAN constructor.
     *
     * @param int $version
     * @param int $segmentNumber
     * @param null $processId
     */
    public function __construct($version, $segmentNumber, $processId = null)
    {
        $data = [];
        $data[] = 4;
        if ($processId) {
            $data = array();
            $data[] = 2;
            $data[] = "";
            $data[] = "";
            $data[] = "";
            $data[] = $processId;
            $data[] = "";
            $data[] = "N";
        }

        parent::__construct(
            static::NAME,
            $segmentNumber,
            $version,
            $data
        );
    }

    /**
     * @return string
     */
    public function getName()
    {
        return static::NAME;
    }
}