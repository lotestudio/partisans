<?php

namespace Lotestudio\Partisans\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;

class VueComponentCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'partisans:vue {component}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create vue component file';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }


    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $component = $this->argument('component');

        $path = $this->componentPath($component);

        $this->createDir($path);

        if (File::exists($path))
        {
            $this->error("File {$path} already exists!");
            return;
        }

        File::copy(__DIR__.'/../../Templates/VueComponent.vue',$path);

        $this->info("File {$path} created.");
    }

    /**
     * Get the view full path.
     *
     * @param string $component
     *
     * @return string
     */
    public function componentPath($component)
    {
        $component = str_replace('.', '/', $component) . '.vue';

        $path = "resources/js/components/{$component}";

        return $path;
    }

    /**
     * Create view directory if not exists.
     *
     * @param $path
     */
    public function createDir($path)
    {
        $dir = dirname($path);

        if (!file_exists($dir))
        {
            mkdir($dir, 0777, true);
        }
    }

}