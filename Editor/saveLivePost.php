<?php
$data = file_get_contents("php://input");
file_put_contents("../Content/savedLive.json", $data);
echo ("Saved at time " . time());
