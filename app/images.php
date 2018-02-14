<?php

namespace Wappz\Images;

use Wappz\Assets;

function getProjectImageOverview($image)
{
    ob_start();
    $Src1140 = $image['sizes']['1140'];
    $Src940  = $image['sizes']['940'];
    $Src720  = $image['sizes']['720'];
    $Src737  = $image['sizes']['737'];
    $Src459  = $image['sizes']['459'];
    ?>
    <source media="(max-width: 490px)" srcset="<?php echo $Src459; ?>"/>
    <source media="(max-width: 767px)" srcset="<?php echo $Src737; ?>"/>
    <source media="(max-width: 991px)" srcset="<?php echo $Src720; ?>"/>
    <source media="(max-width: 1199px)" srcset="<?php echo $Src940; ?>"/>
    <img src="<?php echo $Src1140; ?>" alt="<?php echo $image['title'];?> - Movimento Films"/>
    <?php
    ob_flush();
}

function getPortfolioImage($image)
{
    ob_start();
    $Src360 = $image['sizes']['360'];
    $Src293 = $image['sizes']['293'];
    $Src345 = $image['sizes']['345'];
    $Src737 = $image['sizes']['737'];
    $Src459 = $image['sizes']['459'];
    ?>
    <picture>
        <source media="(max-width: 490px)" srcset="<?php echo $Src459; ?>"/>
        <source media="(max-width: 767px)" srcset="<?php echo $Src737; ?>"/>
        <source media="(max-width: 991px)" srcset="<?php echo $Src345; ?>"/>
        <source media="(max-width: 1199px)" srcset="<?php echo $Src293; ?>"/>
        <img src="<?php echo $Src360; ?>" alt="<?php echo $image['title'];?> - Movimento Films"/>
    </picture>
    <?php
    ob_flush();
}

?>