<?php
/**
 * @package sodium chloride
 * @author Marimuthu @ www.sodiumchloride.in , Mukila @ www.sodiumchloride.in.
 * @version beta 0.1.2
 * @return website https://sodiumchloride.in
 * @return developer contact marimuthu@sodiumchloride.in , mukila@sodiumchloride.in
 * @return ♥ from India.
 * @return true
 */
require_once __DIR__."/vendor/autoload.php";
/**
 *
 */
use App\Class\Env\Env;
/**
 *
 */
(new Env(__DIR__ . '/.env'))->load();
/**
 *
 */
require_once __DIR__.'/config.php';
/**
 * 
 */
require_once __DIR__."/routes/routes.php";
