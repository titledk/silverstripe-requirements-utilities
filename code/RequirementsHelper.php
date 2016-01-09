<?php
/**
 * RequirementsHelper
 * Helper class for theme-dependent requirements
 *
 * @author Anselm Christophersen <ac@anselm.dk>
 * @date   July 2015
 */
class RequirementsHelper extends Object
{

    private static $theme = null;
    private static $theme_dir = null;


    /**
     * Requirements initialization
     */
    public static function load_requirements()
    {
        $theme = Config::inst()->get('SSViewer', 'theme');
        self::$theme = $theme;
        self::$theme_dir = 'themes/' . $theme;

        $r = self::config()->$theme;

        //Debug::dump($r);


        if (isset($r['javascript-combined'])) {
            self::process_combined($r['javascript-combined'], 'javascript');
        }

        if (isset($r['css-combined'])) {
            self::process_combined($r['css-combined'], 'css');
        }

        //screen css
        if (isset($r['css']['screen'])) {
            self::css($r['css']['screen']);
        }
        //print css
        if (isset($r['css']['print'])) {
            self::css($r['css']['print'], 'print');
        }
        //Debug::dump($r);
    }


    /**
     * Requiring the combined js/css files- can be separate library files
     * @param array $libArr
     */
    private static function process_combined($libArr, $type)
    {
        //Debug::dump($libArr);
        $theme = self::$theme;

        //Defining library files
        foreach ($libArr as $lib => $arr) {
            $files = array();

            foreach ($arr as $str) {
                $files[] = self::replace_vars($str);
            }

            foreach ($files as $f) {
                if ($type == 'javascript') {
                    Requirements::javascript($f);
                } elseif ($type == 'css') {
                    Requirements::css($f);
                }
            }

            if ($type == 'javascript') {
                $libName = "$theme/$lib.js";
            } elseif ($type == 'css') {
                $libName = "$theme/$lib.css";
            }

            Requirements::combine_files($libName, $files);
        }
    }

    /**
     * Requiring css
     * @param string $str
     * @param null   $media
     */
    private static function css($str, $media = null)
    {
        $str = self::replace_vars($str);
        Requirements::css($str, $media);
    }


    /**
     * Internal variable replacement
     * @param string $str
     * @return string
     */
    private static function replace_vars($str)
    {
        $themeDir = self::$theme_dir;
        $str = str_replace('$ThemeDir', $themeDir, $str);

        return $str;
    }
}
