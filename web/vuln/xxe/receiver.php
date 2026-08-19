<?php
file_put_contents("xxe_data.log", $_GET['data'] . "\n", FILE_APPEND);
