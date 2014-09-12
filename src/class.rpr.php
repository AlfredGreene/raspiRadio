<?php
/**
 * This is a php class version of AdminLTE for quick integration
 * @author jambonbill
 */
namespace Rpr;

class Download
{
    private $url='';
    private $html='';
    private $files=[];

    /**
     * Get/Set Url
     * @param  string $url [description]
     * @return [type]      [description]
     */
    public function url($url = '')
    {
        if ($url) {
            $this->url=$url;
        }
        return $this->url;
    }

    /**
     * [getHtml description]
     * @return [type] [description]
     */
    public function getPage($url = '')
    {
        if ($url) {
            $this->url=$url;
        }

        $dat=file($this->url);
        $this->html=implode('', $dat);
        return $this->html;
    }


    /**
     * [saveTmp description]
     * @param  string $filename [description]
     * @return [type]           [description]
     */
    public function saveTmp($filename='')
    {
        if(!$this->html()){
            throw new Exception("Get some html first", 1);
        }

        // save as tmp
        $f=fopen($filename, "w");
        fwrite($this->html);
        fclose($f);
        return true;
    }


    /**
     * Read the html page, and get precious urls :)
     * @return [type] [description]
     */
    public function parsePage()
    {

        $dat=explode("\n", $this->html);
        
        foreach ($dat as $line) {
            // gnn         
        }
        return $this->geoData;
    }

    
    /**
     * Save as file
     * @param  string $filename [description]
     * @return [type]           [description]
     */
    public function saveAs($filename = '')
    {

        $f=fopen($filename, "w+");
        fwrite($f, 'pouet');
        fclose($f);
        return true;
    }
}
