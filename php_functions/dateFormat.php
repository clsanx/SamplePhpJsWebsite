<?php

function dateToYmd($fechaorig)
{
    $aux = explode('/', $fechaorig);
    $day = $aux[0];
    $month = $aux[1];
    $year = $aux[2];
    $ymd = array($aux[2], $aux[1], $aux[0]);
    $fechares = implode('/', $ymd);

    return $fechares;
}

function dateToDmy($fechaorig)
{
    $aux = explode('-', $fechaorig);
    $day = $aux[2];
    $month = $aux[1];
    $year = $aux[0];
    $ymd = array($aux[2], $aux[1], $aux[0]);
    $fechares = implode('/', $ymd);

    return $fechares;
}
