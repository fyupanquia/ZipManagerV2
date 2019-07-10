<?php
/**
* ZipManager
* 18.10.17
* @author Yupanqui Allca [fyupanquia]
* @package ZipArchive
*/
class ZipManager extends ZipArchive{

    function toList($zipfile){
        $entries = null;

        if(file_exists($zipfile)){
            $entries    = array();
            $zip        = zip_open($zipfile);

            if (is_resource($zip)){
                while ($entry = zip_read($zip)){
                    $entries[] = zip_entry_name($entry);
                }
            }

            zip_close($zip);
        }

        return $entries;
    }

    function descompress($zipfile, $folder = ""){
        $b      = false;

        if(pathinfo($zipfile, PATHINFO_EXTENSION)=="zip"){
           
            $folder = trim( $folder);
            $folder = ($folder!="") ? $folder : realpath(dirname(__FILE__));

            if(file_exists($zipfile)){

                if(!file_exists($folder) && $folder!=""){ mkdir($folder,0777,true); }

                if ($this->open($zipfile) === TRUE) {
                    $this->extractTo($folder);
                    $this->close();
                    return true;
                }

            }
        }

        return $b;
    }
}