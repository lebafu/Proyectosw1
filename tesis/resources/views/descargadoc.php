<?php
header("Content-disposition: attachment; filename=Hipercubo.doc");
header("Content-type: application/doc");
readfile("Hipercubo.doc");
?>