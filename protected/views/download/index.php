<?php
$fileUrl = './upload/novel/txt'.CV::getFilePath($model->postid).$model->attachment.'.txt';
$fileName = $model->title.'.txt';
$data = file_get_contents($fileUrl);
header("Content-type: application/octet-stream");
header("Accept-Ranges: bytes");
header("Accept-Length: ".filesize($fileUrl));
header("Content-Disposition: attachment; filename=" . $fileName);
echo $data;