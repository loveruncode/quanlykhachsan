<?php
namespace App\Enums;

use App\Supports\Enums;
use BenSampo\Enum\Enum;

enum FurnitureType: string
{
    use Enums;
    case Sofa = 'sofa';
    case CoffeeTable = 'coffee_table';
    case TVStand = 'tv_stand';
    case Bookshelf = 'bookshelf';
    case DecorativeLamp = 'decorative_lamp';
    case Rug = 'rug';
    case DiningTable = 'dining_table';
    case DiningChair = 'dining_chair';
    case Dresser = 'dresser';
    case Bed = 'bed';
    case Wardrobe = 'wardrobe';
    case MakeupTable = 'makeup_table';
    case Desk = 'desk';
    case DeskChair = 'desk_chair';
    case Bathtub = 'bathtub';
    case Shower = 'shower';
    case Sink = 'sink';
    case Toilet = 'toilet';
    case OutdoorTable = 'outdoor_table';
    case OutdoorChair = 'outdoor_chair';
    case Plant = 'plant';
}
