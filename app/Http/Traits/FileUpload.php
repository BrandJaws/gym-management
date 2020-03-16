<?php

namespace App\Http\Traits;

use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;

trait FileUpload
{
    public function uploadSingle(UploadedFile $uploadedFile, $modelObject, $propertyToUpdate, $filename = null, $objectId = null, $disk = "public")
    {
        $name = !is_null($filename) ? $filename : substr($uploadedFile->getClientOriginalName(), 0, strrpos($uploadedFile->getClientOriginalName(), "."));
        $psudoContainer = ($objectId) ? '/' . $objectId : '';
        $folder = 'uploads/' . strtolower(substr(get_class($modelObject), strrpos(get_class($modelObject), '\\') + 1)) . $psudoContainer;
        $file = $uploadedFile->storeAs($folder, sprintf('%s_%s', $name, microtime()) . '.' . $uploadedFile->getClientOriginalExtension(), [
            'disk' => $disk
        ]);
        $this->updateModelProperty($file, $modelObject, $propertyToUpdate, $disk);
        return $file;
    }

    private function updateModelProperty($filePath, $modelObject, $propertyToUpdate, $disk)
    {
        if ($filePath) {
            if (!is_null($modelObject->$propertyToUpdate) && $modelObject->$propertyToUpdate != '') {
                $this->removeExistingFile($modelObject->$propertyToUpdate, $disk);
            }
            $modelObject->$propertyToUpdate = $filePath;
        }
    }

    private function removeExistingFile($filePath, $disk)
    {
        if (Storage::disk($disk)->has($filePath)) {
            Storage::disk($disk)->delete($filePath);
        }
    }

    public function uploadOne(UploadedFile $uploadedFile, $modelObject, $propertyToUpdate, $filename = null, $objectId = null, $disk = "public")
    {
        $name = !is_null($filename) ? $filename : substr($uploadedFile->getClientOriginalName(), 0, strrpos($uploadedFile->getClientOriginalName(), "."));
        $psudoContainer = ($objectId) ? '/' . $objectId : '';
        $folder = 'uploads/user' . strtolower(substr(get_class($modelObject), strrpos(get_class($modelObject), '\\') + 1)) . $psudoContainer;
        $file = $uploadedFile->storeAs($folder, sprintf('%s_%s', $name, microtime()) . '.' . $uploadedFile->getClientOriginalExtension(), [
            'disk' => $disk
        ]);
        $this->updateModelProperty($file, $modelObject, $propertyToUpdate, $disk);
        return $file;
    }
}
