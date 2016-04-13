<?php

namespace Sayme\GulpRevBundle\Twig\Extension;

class GulpRevExtension extends \Twig_Extension
{
    /**
     * @var string
     */
    protected $manifestPath;
    
    /**
     * @var string
     */
    protected $buildDir;

    /**
     * @param string $manifestPath Path to gulp-rev manifest file.
     * @param string $buildDir     The build directory.
     */
    public function __construct($manifestPath, $buildDir)
    {
        $this->manifestPath = $manifestPath;
        $this->buildDir = $buildDir;
    }

    public function getFilters()
    {
        return array(new \Twig_SimpleFilter('asset_rev', array($this, 'getAssetRev')));
    }

    /**
     * Get the path to a revisioned file.
     *
     * @param  string  $file
     * @return string
     *
     * @throws \InvalidArgumentException
     */
    public function getAssetRev($file)
    {
        static $manifest;

        if (is_null($manifest)) {
            $manifest = json_decode(file_get_contents($this->manifestPath), true);
        }

        if (!isset($manifest[$file])) {
            throw new \InvalidArgumentException("File {$file} not defined in asset manifest.");
        }

        return rtrim($this->buildDir, '/').'/'.$manifest[$file];
    }

    public function getName()
    {
        return 'asset_rev';
    }
}