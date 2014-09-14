<?php
/**
 * Watch and provide download urls for my favorite radioshows
 * @author jambonbill
 */
namespace Rpr;


/**
 * 
 */
class Download
{
    private $url='';
    private $html='';
    public $debug=false;
    
    /**
     * Store list of files here
     * @var [type]
     */
    private $files=[];



    /**
     * Get/Set Url to read
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
     * Return the list of href found in $this->html
     * @return [type] [description]
     */
    public function hrefs()
    {
        $hrefs=[];
        
        foreach (explode("\n", $this->html) as $row) {
            preg_match_all("/\ba href=\"(.*)\"/i", $row, $o);
            if (count($o[1])) {
                //print_r($o[1]);
                foreach ($o[1] as $url) {
                    $hrefs[]=$url;
                }
            }
        }
        
        return $hrefs;
    }


    public function mp3s()
    {
        $mp3s=[];
        //"http://cdn.ouiedire.net/assets/emission/ailleurs-65/ouiedire_ailleurs-65_gakona_demantelement.mp3"
        foreach (explode("\n", $this->html) as $row) {
            preg_match_all("/\b(http:\/\/cdn.*\.mp3)/i", $row, $o);
            if (count($o[1])) {
                //print_r($o[1]);
                foreach ($o[1] as $mp3) {
                    if (!in_array($mp3, $mp3s)) {
                        $mp3s[]=$mp3;
                    }
                }
            }
        }
        return $mp3s;
    }

    public function custom($regex = '')
    {
        $dat=[];
        foreach (explode("\n", $this->html) as $row) {
            preg_match_all($regex, $row, $o);
            if (count($o[1])) {
                //print_r($o[1]);
                foreach ($o[1] as $match) {
                    if (!in_array($match, $dat)) {
                        $dat[]=$match;
                    }
                }
            }
        }
        return $dat;
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


    public function addFile($url = '')
    {
        if(!in_array($url, $this->files)) {
            $this->files[]=$url;    
        } else {
            return false;
        }

        return $url;
    }

    /**
     * Return list of files
     * @return [type] [description]
     */
    public function files()
    {
        return $this->files;
    }

}
