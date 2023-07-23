 <?php
        $id="readerdc64_es_hi_mdr_install.exe";
        $enlace = "./".$id;
        header ("Content-Disposition: attachment; filename=".$id);
        header ("Content-Type: application/octet-stream");
        header("Content-Transfer-Encoding: Binary"); 
        header ("Content-Length: ".filesize($enlace));
        readfile($enlace); 
      ?> 
