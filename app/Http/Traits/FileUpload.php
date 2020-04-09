<?php

namespace App\Http\Traits;

use App\Image;
use Illuminate\Http\File;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;

trait FileUpload
{
    private function updateModelProperty($filePath, $modelObject, $propertyToUpdate, $disk)
    {
        if ($filePath) {
            if (!is_null($modelObject->$propertyToUpdate) && $modelObject->$propertyToUpdate != '') {
                $this->removeExistingFile($filePath, $disk);
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

    public function uploadEmployee(UploadedFile $uploadedFile, $modelObject, $propertyToUpdate, $filename = null, $objectId = null, $disk = "public")
    {
        $imageDelete = Image::where('image_type', 'App\Employee')->where('image_id', $objectId)->get();
        if (count($imageDelete) > -1) {
            foreach ($imageDelete as $image) {
                $image_path = $image->path;
                if (file_exists($image_path)) {
                    Storage::disk($disk)->delete($image_path);
                }
                Image::destroy($image->id);
            }
            $name = !is_null($filename) ? $filename : substr($uploadedFile->getClientOriginalName(), 0, strrpos($uploadedFile->getClientOriginalName(), "."));
            $psudoContainer = ($objectId) ? '/' . $objectId : '';
            $folder = 'uploads/gym/employee' . strtolower(substr(get_class($modelObject), strrpos(get_class($modelObject), '\\') + 1)) . $psudoContainer;
            $file = $uploadedFile->storeAs($folder, sprintf('%s_%s', str_replace(' ', '_', $name), str_replace(' ', '_', microtime())) . '.' . $uploadedFile->getClientOriginalExtension(), [
                'disk' => $disk
            ]);
            $this->updateModelProperty($file, $modelObject, $propertyToUpdate, $disk);
            return $file;
        } else {
            $name = !is_null($filename) ? $filename : substr($uploadedFile->getClientOriginalName(), 0, strrpos($uploadedFile->getClientOriginalName(), "."));
            $psudoContainer = ($objectId) ? '/' . $objectId : '';
            $folder = 'uploads/gym/employee' . strtolower(substr(get_class($modelObject), strrpos(get_class($modelObject), '\\') + 1)) . $psudoContainer;
            $file = $uploadedFile->storeAs($folder, sprintf('%s_%s', str_replace(' ', '_', $name), str_replace(' ', '_', microtime())) . '.' . $uploadedFile->getClientOriginalExtension(), [
                'disk' => $disk
            ]);
            $this->updateModelProperty($file, $modelObject, $propertyToUpdate, $disk);
            return $file;
        }
    }

    public function deleteEmployeeImg($id, $disk = "public")
    {
        $imageDelete = Image::where('image_type', 'App\Employee')->where('image_id', $id)->get();
        foreach ($imageDelete as $image) {
            $image_path = $image->path;
            if (file_exists($image_path)) {
                Storage::disk($disk)->delete($image_path);
            }
            Image::destroy($image->id);
        }
    }

    public function uploadSupplier(UploadedFile $uploadedFile, $modelObject, $propertyToUpdate, $filename = null, $objectId = null, $disk = "public")
    {
        $imageDelete = Image::where('image_type', 'App\Supplier')->where('image_id', $objectId)->get();
        if (count($imageDelete) > -1) {
            foreach ($imageDelete as $image) {
                $image_path = $image->path;
                if (file_exists($image_path)) {
                    Storage::disk($disk)->delete($image_path);
                }
                Image::destroy($image->id);
            }
            $name = !is_null($filename) ? $filename : substr($uploadedFile->getClientOriginalName(), 0, strrpos($uploadedFile->getClientOriginalName(), "."));
            $psudoContainer = ($objectId) ? '/' . $objectId : '';
            $folder = 'uploads/gym/supplier' . strtolower(substr(get_class($modelObject), strrpos(get_class($modelObject), '\\') + 1)) . $psudoContainer;
            $file = $uploadedFile->storeAs($folder, sprintf('%s_%s', str_replace(' ', '_', $name), str_replace(' ', '_', microtime())) . '.' . $uploadedFile->getClientOriginalExtension(), [
                'disk' => $disk
            ]);
            $this->updateModelProperty($file, $modelObject, $propertyToUpdate, $disk);
            return $file;
        } else {
            $name = !is_null($filename) ? $filename : substr($uploadedFile->getClientOriginalName(), 0, strrpos($uploadedFile->getClientOriginalName(), "."));
            $psudoContainer = ($objectId) ? '/' . $objectId : '';
            $folder = 'uploads/gym/supplier' . strtolower(substr(get_class($modelObject), strrpos(get_class($modelObject), '\\') + 1)) . $psudoContainer;
            $file = $uploadedFile->storeAs($folder, sprintf('%s_%s', str_replace(' ', '_', $name), str_replace(' ', '_', microtime())) . '.' . $uploadedFile->getClientOriginalExtension(), [
                'disk' => $disk
            ]);
            $this->updateModelProperty($file, $modelObject, $propertyToUpdate, $disk);
            return $file;
        }
    }

    public function deleteSupplierImg($id, $disk = "public")
    {
        $imageDelete = Image::where('image_type', 'App\Supplier')->where('image_id', $id)->get();
        foreach ($imageDelete as $image) {
            $image_path = $image->path;
            if (file_exists($image_path)) {
                Storage::disk($disk)->delete($image_path);
            }
            Image::destroy($image->id);
        }
    }

    public function uploadMemberImg(UploadedFile $uploadedFile, $modelObject, $propertyToUpdate, $filename = null, $objectId = null, $disk = "public")
    {
        $imageDelete = Image::where('image_type', 'App\Member')->where('image_id', $objectId)->get();
        if (count($imageDelete) > -1) {
            foreach ($imageDelete as $image) {
                $image_path = $image->path;
                if (file_exists($image_path)) {
                    Storage::disk($disk)->delete($image_path);
                }
                Image::destroy($image->id);
            }
            $name = !is_null($filename) ? $filename : substr($uploadedFile->getClientOriginalName(), 0, strrpos($uploadedFile->getClientOriginalName(), "."));
            $psudoContainer = ($objectId) ? '/' . $objectId : '';
            $folder = 'uploads/gym/member' . strtolower(substr(get_class($modelObject), strrpos(get_class($modelObject), '\\') + 1)) . $psudoContainer;
            $file = $uploadedFile->storeAs($folder, sprintf('%s_%s', str_replace(' ', '_', $name), str_replace(' ', '_', microtime())) . '.' . $uploadedFile->getClientOriginalExtension(), [
                'disk' => $disk
            ]);
            $this->updateModelProperty($file, $modelObject, $propertyToUpdate, $disk);
            return $file;
        } else {
            $name = !is_null($filename) ? $filename : substr($uploadedFile->getClientOriginalName(), 0, strrpos($uploadedFile->getClientOriginalName(), "."));
            $psudoContainer = ($objectId) ? '/' . $objectId : '';
            $folder = 'uploads/gym/member' . strtolower(substr(get_class($modelObject), strrpos(get_class($modelObject), '\\') + 1)) . $psudoContainer;
            $file = $uploadedFile->storeAs($folder, sprintf('%s_%s', str_replace(' ', '_', $name), str_replace(' ', '_', microtime())) . '.' . $uploadedFile->getClientOriginalExtension(), [
                'disk' => $disk
            ]);
            $this->updateModelProperty($file, $modelObject, $propertyToUpdate, $disk);
            return $file;
        }
    }

    public function deleteMemberImg($id, $disk = "public")
    {
        $imageDelete = Image::where('image_type', 'App\Member')->where('image_id', $id)->get();
        foreach ($imageDelete as $image) {
            $image_path = $image->path;
            if (file_exists($image_path)) {
                Storage::disk($disk)->delete($image_path);
            }
            Image::destroy($image->id);
        }
    }


    public function uploadAdminImg(UploadedFile $uploadedFile, $modelObject, $propertyToUpdate, $filename = null, $objectId = null, $disk = "public")
    {
        $imageDelete = Image::where('image_type', 'App\Admin')->where('image_id', $objectId)->get();
        if (count($imageDelete) > -1) {
            foreach ($imageDelete as $image) {
                $image_path = $image->path;
                if (file_exists($image_path)) {
                    Storage::disk($disk)->delete($image_path);
                }
                Image::destroy($image->id);
            }
            $name = !is_null($filename) ? $filename : substr($uploadedFile->getClientOriginalName(), 0, strrpos($uploadedFile->getClientOriginalName(), "."));
            $psudoContainer = ($objectId) ? '/' . $objectId : '';
            $folder = 'uploads/admin' . strtolower(substr(get_class($modelObject), strrpos(get_class($modelObject), '\\') + 1)) . $psudoContainer;
            $file = $uploadedFile->storeAs($folder, sprintf('%s_%s', str_replace(' ', '_', $name), str_replace(' ', '_', microtime())) . '.' . $uploadedFile->getClientOriginalExtension(), [
                'disk' => $disk
            ]);
            $this->updateModelProperty($file, $modelObject, $propertyToUpdate, $disk);
            return $file;
        } else {
            $name = !is_null($filename) ? $filename : substr($uploadedFile->getClientOriginalName(), 0, strrpos($uploadedFile->getClientOriginalName(), "."));
            $psudoContainer = ($objectId) ? '/' . $objectId : '';
            $folder = 'uploads/admin' . strtolower(substr(get_class($modelObject), strrpos(get_class($modelObject), '\\') + 1)) . $psudoContainer;
            $file = $uploadedFile->storeAs($folder, sprintf('%s_%s', str_replace(' ', '_', $name), str_replace(' ', '_', microtime())) . '.' . $uploadedFile->getClientOriginalExtension(), [
                'disk' => $disk
            ]);
            $this->updateModelProperty($file, $modelObject, $propertyToUpdate, $disk);
            return $file;
        }
    }


    public function uploadTrainerImg(UploadedFile $uploadedFile, $modelObject, $propertyToUpdate, $filename = null, $objectId = null, $disk = "public")
    {
        $imageDelete = Image::where('image_type', 'App\Trainer')->where('image_id', $objectId)->get();
        if (count($imageDelete) > -1) {
            foreach ($imageDelete as $image) {
                $image_path = $image->path;
                if (file_exists($image_path)) {
                    Storage::disk($disk)->delete($image_path);
                }
                Image::destroy($image->id);
            }
            $name = !is_null($filename) ? $filename : substr($uploadedFile->getClientOriginalName(), 0, strrpos($uploadedFile->getClientOriginalName(), "."));
            $psudoContainer = ($objectId) ? '/' . $objectId : '';
            $folder = 'uploads/gym/trainer' . strtolower(substr(get_class($modelObject), strrpos(get_class($modelObject), '\\') + 1)) . $psudoContainer;
            $file = $uploadedFile->storeAs($folder, sprintf('%s_%s', str_replace(' ', '_', $name), str_replace(' ', '_', microtime())) . '.' . $uploadedFile->getClientOriginalExtension(), [
                'disk' => $disk
            ]);
            $this->updateModelProperty($file, $modelObject, $propertyToUpdate, $disk);
            return $file;
        } else {
            $name = !is_null($filename) ? $filename : substr($uploadedFile->getClientOriginalName(), 0, strrpos($uploadedFile->getClientOriginalName(), "."));
            $psudoContainer = ($objectId) ? '/' . $objectId : '';
            $folder = 'uploads/gym/trainer' . strtolower(substr(get_class($modelObject), strrpos(get_class($modelObject), '\\') + 1)) . $psudoContainer;
            $file = $uploadedFile->storeAs($folder, sprintf('%s_%s', str_replace(' ', '_', $name), str_replace(' ', '_', microtime())) . '.' . $uploadedFile->getClientOriginalExtension(), [
                'disk' => $disk
            ]);
            $this->updateModelProperty($file, $modelObject, $propertyToUpdate, $disk);
            return $file;
        }
    }

    public function deleteTrainerImg($id, $disk = "public")
    {
        $imageDelete = Image::where('image_type', 'App\Trainer')->where('image_id', $id)->get();
        foreach ($imageDelete as $image) {
            $image_path = $image->path;
            if (file_exists($image_path)) {
                Storage::disk($disk)->delete($image_path);
            }
            Image::destroy($image->id);
        }
    }

    public function uploadTrainingImg(UploadedFile $uploadedFile, $modelObject, $propertyToUpdate, $filename = null, $objectId = null, $disk = "public")
    {
        $imageDelete = Image::where('image_type', 'App\Training')->where('image_id', $objectId)->get();
        if (count($imageDelete) > -1) {
            foreach ($imageDelete as $image) {
                $image_path = $image->path;
                if (file_exists($image_path)) {
                    Storage::disk($disk)->delete($image_path);
                }
                Image::destroy($image->id);
            }
            $name = !is_null($filename) ? $filename : substr($uploadedFile->getClientOriginalName(), 0, strrpos($uploadedFile->getClientOriginalName(), "."));
            $psudoContainer = ($objectId) ? '/' . $objectId : '';
            $folder = 'uploads/gym/training' . strtolower(substr(get_class($modelObject), strrpos(get_class($modelObject), '\\') + 1)) . $psudoContainer;
            $file = $uploadedFile->storeAs($folder, sprintf('%s_%s', str_replace(' ', '_', $name), str_replace(' ', '_', microtime())) . '.' . $uploadedFile->getClientOriginalExtension(), [
                'disk' => $disk
            ]);
            $this->updateModelProperty($file, $modelObject, $propertyToUpdate, $disk);
            return $file;
        } else {
            $name = !is_null($filename) ? $filename : substr($uploadedFile->getClientOriginalName(), 0, strrpos($uploadedFile->getClientOriginalName(), "."));
            $psudoContainer = ($objectId) ? '/' . $objectId : '';
            $folder = 'uploads/gym/training' . strtolower(substr(get_class($modelObject), strrpos(get_class($modelObject), '\\') + 1)) . $psudoContainer;
            $file = $uploadedFile->storeAs($folder, sprintf('%s_%s', str_replace(' ', '_', $name), str_replace(' ', '_', microtime())) . '.' . $uploadedFile->getClientOriginalExtension(), [
                'disk' => $disk
            ]);
            $this->updateModelProperty($file, $modelObject, $propertyToUpdate, $disk);
            return $file;
        }
    }

    public function deleteTrainingImg($id, $disk = "public")
    {
        $imageDelete = Image::where('image_type', 'App\Training')->where('image_id', $id)->get();
        foreach ($imageDelete as $image) {
            $image_path = $image->path;
            if (file_exists($image_path)) {
                Storage::disk($disk)->delete($image_path);
            }
            Image::destroy($image->id);
        }
    }

    public function uploadProductImg(UploadedFile $uploadedFile, $modelObject, $propertyToUpdate, $filename = null, $objectId = null, $disk = "public")
    {
        $imageDelete = Image::where('image_type', 'App\ShopProduct')->where('image_id', $objectId)->get();
        if (count($imageDelete) > -1) {
            foreach ($imageDelete as $image) {
                $image_path = $image->path;
                if (file_exists($image_path)) {
                    Storage::disk($disk)->delete($image_path);
                }
                Image::destroy($image->id);
            }
            $name = !is_null($filename) ? $filename : substr($uploadedFile->getClientOriginalName(), 0, strrpos($uploadedFile->getClientOriginalName(), "."));
            $psudoContainer = ($objectId) ? '/' . $objectId : '';
            $folder = 'uploads/gym/product' . strtolower(substr(get_class($modelObject), strrpos(get_class($modelObject), '\\') + 1)) . $psudoContainer;
            $file = $uploadedFile->storeAs($folder, sprintf('%s_%s', str_replace(' ', '_', $name), str_replace(' ', '_', microtime())) . '.' . $uploadedFile->getClientOriginalExtension(), [
                'disk' => $disk
            ]);
            $this->updateModelProperty($file, $modelObject, $propertyToUpdate, $disk);
            return $file;
        } else {
            $name = !is_null($filename) ? $filename : substr($uploadedFile->getClientOriginalName(), 0, strrpos($uploadedFile->getClientOriginalName(), "."));
            $psudoContainer = ($objectId) ? '/' . $objectId : '';
            $folder = 'uploads/gym/product' . strtolower(substr(get_class($modelObject), strrpos(get_class($modelObject), '\\') + 1)) . $psudoContainer;
            $file = $uploadedFile->storeAs($folder, sprintf('%s_%s', str_replace(' ', '_', $name), str_replace(' ', '_', microtime())) . '.' . $uploadedFile->getClientOriginalExtension(), [
                'disk' => $disk
            ]);
            $this->updateModelProperty($file, $modelObject, $propertyToUpdate, $disk);
            return $file;
        }
    }

    public function deleteProductImg($id, $disk = "public")
    {
        $imageDelete = Image::where('image_type', 'App\ShopProduct')->where('image_id', $id)->get();
        foreach ($imageDelete as $image) {
            $image_path = $image->path;
            if (file_exists($image_path)) {
                Storage::disk($disk)->delete($image_path);
            }
            Image::destroy($image->id);
        }
    }

}
