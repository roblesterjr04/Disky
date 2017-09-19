<?php

namespace roblesterjr04\disky;

use League\Flysystem\FilesystemInterface;
use League\Flysystem\PluginInterface;
use Storage;
use File;

class DiskyPlugin_Copy implements PluginInterface
{
	
	protected $filesystem;
	
    public function setFilesystem(FilesystemInterface $filesystem) {
	    $this->filesystem = $filesystem;
    }

    public function getMethod() {
	    return 'copyToDisk';
    }
    
    public function handle($path, $disk, $destination = []) {
	    
	    $files = $this->filesystem->listContents($path);
	    
	    if (is_string($destination)) {
		    $destination = [$destination];
	    }
	    
	    if (count($destination) == 0) {
		    $destination = [$path];
	    }
	    
	    if (is_string($disk)) {
		    $disk = [$disk];
	    }
	    
	    if (count($files)) {
		    foreach ($files as $file) {
			    $file_dest = [];
			    foreach ($destination as $fpath) {
				    $file_dest[] = $fpath . '/' . basename($file['path']);
			    }
			    $this->copy($file, $disk, $file_dest);
		    }
	    } else {
		    $this->copy($path, $disk, $destination);
	    }
	    
	    return $this->filesystem;
    }
    
    private function copy($file, $disks, $destination) {
	    
	    $path = is_string($file) ? $file : $file['path'];
	    foreach ($disks as $disk) {
		    if (is_array($file)) {
			    $fileContents = $this->filesystem->get($file['path'])->read();
			    foreach ($destination as $destpath) {
			    	Storage::disk($disk)->put($destpath, $fileContents);
			    }
			    
		    } else {
			    $fileContents = $this->filesystem->get($file)->read();
			    foreach ($destination as $destpath) {
			    	Storage::disk($disk)->put($destpath, $fileContents);
			    }
			    
		    }
		    
	    }
	    //$this->filesystem->delete($path);
	    
    }
}
