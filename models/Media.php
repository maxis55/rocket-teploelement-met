<?php

namespace app\models;

use DirectoryIterator;
use Imagine\Image\Box;
use Yii;
use yii\db\ActiveRecord;
use yii\helpers\Url;
use yii\imagine\Image;
use yii\web\NotFoundHttpException;
use yii\web\Response;
use yii\web\UploadedFile;

/**
 * Model for work with images
 *
 */
class Media extends ActiveRecord
{


    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'media';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name'], 'required'],
            [['name'], 'string', 'max' => 255],
            [['title'], 'string', 'max' => 60],
            [['alt'], 'string', 'max' => 125],
            [['name'], 'unique'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Имя файла',
            'title' => 'Название изображения',
            'alt' => 'Alt изображения',
        ];
    }

    /**
     * Single image upload method
     */
    public static function uploadImage($file)
    {

        if (@is_array(getimagesize($file->tempName))) {
            $type = 'image';
        } else {
            $type = 'file';
        }
        $name = $file->name;
        $nameOccurences = 0;
        while (is_file(Yii::getAlias('@webroot') . '/uploads/' . $type . '/' . $name)) {
            $name = pathinfo($file->name, PATHINFO_FILENAME) . '-' . ++$nameOccurences . '.' . pathinfo($file->name, PATHINFO_EXTENSION);
        }
        if (0 != $nameOccurences) {
            $name = pathinfo($file->name, PATHINFO_FILENAME) . '-' . $nameOccurences . '.' . pathinfo($file->name, PATHINFO_EXTENSION);
        }

        if (!is_dir(Yii::getAlias('@webroot') . '/uploads/' . $type)) {
            mkdir(Yii::getAlias('@webroot') . '/uploads/' . $type, 0777, true);
        }

        if ($file->saveAs(Yii::getAlias('@webroot') . '/uploads/' . $type . '/' . $name)) {

            $image = new Media();
            $image->name = $name;
            $image->title = $file->name;
            $image->alt = '';
            $image->type = $type;

            $image->save();

        }
    }


    public function getImageOfSize($height = '', $width = '', $quality = 90)
    {

        $defaultPath = Yii::getAlias('@web/' . 'uploads/' . $this->type . '/' . $this->name);
        $defaultPath2 = Yii::getAlias('@webroot/' . 'uploads/' . $this->type . '/' . $this->name);
        $pathDimensions = Yii::getAlias('@web') . '/uploads/' . $this->type . '/' . $width . 'x' . $height . '/';
        $pathDimensions2 = Yii::getAlias('@webroot') . '/uploads/' . $this->type . '/' . $width . 'x' . $height . '/';



        if ('' == $height || '' == $width) {
            return $defaultPath;
        }

        //if file is not image return original path
        if (!@is_array(getimagesize($defaultPath2))) {
             return $defaultPath;
        }


        if (file_exists($pathDimensions2 . $this->name)) {
            return $pathDimensions . $this->name;
        }

        if (file_exists($defaultPath2)) {

            if (!is_dir($pathDimensions2)) {
                mkdir($pathDimensions2, 0777, true);
            }
            Image::getImagine()
                ->open($defaultPath2)
                ->thumbnail(new Box($width, $height))
                ->save($pathDimensions2 . $this->name, ['quality' => $quality]);

            return $pathDimensions . $this->name;
        }
        return null;
    }

    public static function getImagesLibrary($counter,$type='image')
    {
        $result = array();
        $query = Media::find()->where(['type'=>$type])->offset($counter * 12)->limit(12)->all();
        Yii::$app->response->format = Response::FORMAT_JSON;

        if('image'==$type){
            foreach ($query as $media_item) {
                $result[0] .= '<div class="media-image"><img class="media-selected" src="/uploads/' . $type . '/' . $media_item['name'] . '" data-imageid="' . $media_item['id'] . '" title="' . $media_item['title'] . '"></div>';
            }
        }else{
            foreach ($query as $media_item) {
                $result[0] .= '<div class="media-image"><a class="media-selected-file" target="_blank" href="/uploads/' . $type . '/' . $media_item['name'] . '" data-imageid="' . $media_item['id'] . '">' . $media_item['name'] . '</a></div>';
            }
        }

        if (count($query) == 12) {
            $result[1] = true;
            $counter++;
        } else {
            $result[1] = false;
            $counter = false;
        }
        $result[2] = $counter;
        return $result;
    }

    public static function findById($id)
    {
        if (($model = Media::findOne($id)) !== null) {
            return $model;
        }
        throw new NotFoundHttpException('The requested page does not exist.');
    }

    public function afterDelete()
    {
        parent::afterDelete();
        //delete file physically
        $defaultPath = Yii::$app->basePath . '/web' . '/uploads/' . $this->type . '/';

        foreach (new DirectoryIterator($defaultPath) as $fileInfo) {

            if ($fileInfo->isDot() || $fileInfo->isFile()) {
                continue;
            }

            if ($fileInfo->isDir()) {

                $sizePath = $fileInfo->getRealPath() .'/'. $this->name;
                if (is_file($sizePath)) {
                    unlink($sizePath);
                }

            }
        }
        unlink($defaultPath. $this->name);

    }

}