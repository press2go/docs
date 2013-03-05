<?php

namespace Content;

use \dflydev\markdown\MarkdownParser;

class Page
{
    protected $fn;
    protected $content_file;
    protected $sidebar_file;
    protected $settings;
    protected $area;
    protected $ht_path;

    public function __construct($fn)
    {
        $this->fn = $fn;
    }

    public function getSetting($index, $value = null)
    {
        if ($this->settings === null) {
            $fn = "{$this->fn}_settings.json";
            if (!file_exists($fn)) {
                return;
            }
            $result = json_decode(file_get_contents($fn), 1);
            if ($result === null) {
                return;
            }
            $this->settings = $result;
        }

        if (isset($this->settings[$index])) {
            return $this->settings[$index];
        }

        return $value;
    }

    public function getTitle()
    {
        return $this->getSetting('title', ucfirst(basename($this->fn)));
    }

    public function getContent()
    {
        if ($this->content_file === '_index.md' &&
            !file_exists($this->fn . $this->content_file))
        {
            $t = $this->getSetting('index');
            if ($t !== null) {
                return $this->loadContent("{$this->fn}{$t}.md");
            }
        }

        return $this->loadContent($this->fn . $this->content_file);
    }

    public function getSidebarContent()
    {
        try {
            return $this->loadContent($this->fn . $this->sidebar_file);
        } catch (NotFoundException $e) {
            return;
        }
    }

    private function loadContent($fn)
    {
        if (!file_exists($fn)) {
            throw new NotFoundException();
        }

        $raw = @file_get_contents($fn);
        if (empty($raw)) {
            return;
        }

        $raw = str_replace('{{path}}', "{$this->ht_path}{$this->area}", $raw);

        $parser = new MarkdownParser();
        return $parser->transformMarkdown($raw);
    }

    public function setContentFile($file)
    {
        $this->content_file = $file;
        return $this;
    }

    public function setSidebarFile($file)
    {
        $this->sidebar_file = $file;
        return $this;
    }

    public function setArea($area)
    {
        $this->area = $area;
        return $this;
    }

    public function setHtPath($path)
    {
        $this->ht_path = $path;
        return $this;
    }

}
