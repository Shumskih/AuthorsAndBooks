<?php
namespace App\Custom\Services\RustScripts;

class RustScriptLinux extends RustScript
{

    public function compile()
    {
        exec('rustc rust/scripts/remove_dir.rs && mv remove_dir rust/compiled/linux/');
        exec('rustc rust/scripts/create_dir.rs && mv create_dir rust/compiled/linux/');
    }

    public function isScriptsExists()
    {
        if (file_exists('./rust/compiled/linux/create_dir')
            && file_exists('./rust/compiled/linux/remove_dir')) {
            return true;
        }
        return false;
    }

}
