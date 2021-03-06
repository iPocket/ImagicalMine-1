<?php
/**
 * src/pocketmine/block/LightWeightedPressurePlate.php
 *
 * @package default
 */




namespace pocketmine\block;

use pocketmine\item\Tool;
use pocketmine\item\Item;

class LightWeightedPressurePlate extends WoodenPressurePlate
{

    protected $id = self::LIGHT_WEIGHTED_PRESSURE_PLATE;

    /**
     *
     * @param unknown $meta (optional)
     */
    public function __construct($meta = 0)
    {
        $this->meta = $meta;
    }



    /**
     *
     * @return unknown
     */
    public function getToolType()
    {
        return Tool::TYPE_PICKAXE;
    }


    /**
     *
     * @return unknown
     */
    public function getName()
    {
        return "Light Weighted Pressure Plate";
    }


    /**
     *
     * @return unknown
     */
    public function getHardness()
    {
        return 0.5;
    }


    /**
     *
     * @param Item    $item
     * @return unknown
     */
    public function getDrops(Item $item)
    {
        if ($item->isPickaxe()) {
            return [
                [$this->id, 0, 1]
            ];
        }
        return [];
    }
}
