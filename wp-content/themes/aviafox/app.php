<?php

define('MDLD', __DIR__ . '/../../../models');

require MDLD . '/Tracker.php';
Tracker::gi()->process();