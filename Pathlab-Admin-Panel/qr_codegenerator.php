<?php
require('phpqrcode/qrlib.php');
QRcode::png($_GET['code']);

?>