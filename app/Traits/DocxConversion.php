<?php
namespace App\Traits;

use DOMDocument;
use PhpOffice\PhpWord\Shared\ZipArchive;

Trait DocxConversion{

    public static function extract_information($filename) {
        if(isset($filename) && !file_exists($filename)) {
            return [
                'status'    => 'error',
                'message'   => 'File Not exists'
            ];
        }

        $fileArray = pathinfo($filename);
        $file_ext  = $fileArray['extension'];
        if($file_ext == "doc" || $file_ext == "docx" || $file_ext == "xlsx" || $file_ext == "pptx")
        {
            if($file_ext == "doc") {
                return [
                    'status' => 'success',
                    'data'   => self::read_doc($filename)
                ];
            } else if($file_ext == "docx") {
                return [
                    'status' => 'success',
                    'data'   => self::read_docx($filename)
                ];
            } 
        } else {
            return [
                'status'    => 'error',
                'message'   => 'Invalid File Type'
            ];
        }
    }
    
    private static function read_doc($filename) {
        $fileHandle = fopen($filename, "r");
        $line = @fread($fileHandle, filesize($filename));   
        $lines = explode(chr(0x0D),$line);
        $outtext = "";
        foreach($lines as $thisline)
          {
            $pos = strpos($thisline, chr(0x00));
            if (($pos !== FALSE)||(strlen($thisline)==0))
              {
              } else {
                $outtext .= $thisline." ";
              }
          }
         $outtext = preg_replace("/[^a-zA-Z0-9\s\,\.\-\n\r\t@\/\_\(\)]/","",$outtext);
        return $outtext;
    }

    private static function read_docx($filename){

        $striped_content = '';
        $content = '';
        $zip = zip_open($filename);

        if (!$zip || is_numeric($zip)) return false;

        while ($zip_entry = zip_read($zip)) {

            if (zip_entry_open($zip, $zip_entry) == FALSE) continue;

            if (zip_entry_name($zip_entry) != "word/document.xml") continue;

            $content .= zip_entry_read($zip_entry, zip_entry_filesize($zip_entry));

            zip_entry_close($zip_entry);
        }// end while

        zip_close($zip);

        $content = str_replace('</w:r></w:p></w:tc><w:tc>', " ", $content);
        $content = str_replace('</w:r></w:p>', "\r\n", $content);
        $striped_content = strip_tags($content);

        return $striped_content;
    }

}