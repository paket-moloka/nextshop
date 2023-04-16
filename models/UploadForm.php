<?php
namespace app\models;

use yii\base\Model;
use yii\web\UploadedFile;

class UploadForm extends Model
{
    /**
     * @var UploadedFile[]
     */
    public $files;

    public function rules()
    {
        return [
            [['files'], 'file', 'skipOnEmpty' => true, 'extensions' => 'png, jpg', 'maxFiles' => 10],
        ];
    }

    public function upload($product_id)
    {
        if ($this->validate()) {
            foreach ($this->files as $file) {
                $model = new Images();
                $model->product_id = $product_id;
                $model->filename = $file->baseName;
                $model->original_filename = $file->baseName. '.' .$file->extension;
                $model->ext = $file->extension;
                $model->save();
                $file->saveAs(Products::setLinkPath($product_id, $model));
            }
            return true;
        } else {
            return false;
        }
    }
}
?>