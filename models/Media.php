<?php

namespace app\models;

use Imagine\Image\Box;
use Yii;
use yii\db\ActiveRecord;
use yii\imagine\Image;
use yii\web\Response;
use yii\web\UploadedFile;

/**
 * Model for work with images
 *
 */
class Media extends ActiveRecord
{

    public $image;

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
            'name' => 'Name',
            'title' => 'Название',
            'alt' => 'Alt изображения',
        ];
    }

    /**
     * Single image upload method
     */
	public function uploadImage($file)
	{
		$name = md5(time()) . '.' . pathinfo($file->name, PATHINFO_EXTENSION);
		if( $file->saveAs( Yii::getAlias('@web') . 'uploads/images/' . $name ) )
		{
			$image = new Media();
			$image->name = $name;
			$image->title = $file->name;
			$image->alt = '';


			$image->save();
		}
	}


	public function getImageOfSize($height='',$width='',$quality=90){

	    if(''==$height||''==$width){
            return Yii::getAlias('@web/' . 'uploads/images/'. $this->name);
        }
        if(file_exists(Yii::getAlias('@web'). 'uploads/images/'.$this->name) || file_exists(Yii::getAlias('@web'). 'uploads/images/'.$width.'x'.$height.'/'.$this->name)){
            if(! file_exists(Yii::getAlias('@web'). 'uploads/images/'.$width.'x'.$height.'/'.$this->name) ){
                if (!is_dir(Yii::getAlias('@web'). 'uploads/images/'.$width.'x'.$height.'/')) {
                    mkdir(Yii::getAlias('@web'). 'uploads/images/'.$width.'x'.$height.'/', 0777, true);
                }
                Image::getImagine()->open(Yii::getAlias('@web') . 'uploads/images/'.$this->name)->thumbnail(new Box($width,$height ))->save(Yii::getAlias('@web'). 'uploads/images/'.$width.'x'.$height.'/'.$this->name , ['quality' => $quality]);
            }

            return Yii::getAlias('@web/' . 'uploads/images/'.$width.'x'.$height.'/' . $this->name);
        }
        return null;
    }

    public static function getImagesLibrary($counter){
	    $result = array();
        $query = Media::find()->offset($counter*12)->limit(12)->all();
        Yii::$app->response->format = Response::FORMAT_JSON;
        foreach ($query as $image){
            $result[0] .= '<div class="media-image"><img class="media-selected" src="/uploads/images/'.$image['name'].'" data-imageid="'.$image['id'].'" title="'.$image['title'].'"></div>';
        }
        if(count($query)==12)
        {
            $result[1] = true;
            $counter++;
        } else {
            $result[1] = false;
            $counter = false;
        }
        $result[2] =  $counter;
        return $result;
    }


}