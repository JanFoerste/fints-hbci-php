<?php
/**
 * Created by PhpStorm.
 * User: jan-ole.foerste
 * Date: 06.09.2017
 * Time: 10:21
 */

namespace Fhp\Segment;


use Fhp\DataTypes\Bin;
use Fhp\DataTypes\Kti;

class HKCCS extends AbstractSegment
{
    const NAME = 'HKCCS';
    const VERSION = 1;

    /**
     * HKCCS constructor.
     * @param int $version
     * @param int $segmentNumber
     * @param Kti $kti
     * @param string $SEPADescriptor
     * @param string $pain
     */
    public function __construct($version, $segmentNumber, $kti, $SEPADescriptor, $pain)
    {
        parent::__construct(
            static::NAME,
            $segmentNumber,
            $version,
            [
                $kti,
                $SEPADescriptor,
                new Bin($pain)
            ]
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