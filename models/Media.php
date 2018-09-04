<?php

namespace app\models;

use Yii;
use yii\db\ActiveRecord;
use yii\data\Pagination;
use yii\web\Response;

class Media extends ActiveRecord{


    /**
     * Get count of all images
     */
	public static function getTotalCount()
	{
		return Media::find()->where([])->count();
	}


    /**
     * Get images for admin panel
     */
	public static function getImages($pages)
	{
		$query = Media::find()->select(['id','image']);
	    $countQuery = clone $query;

	    $pages = new Pagination(['totalCount' => $countQuery->count()]);

	    return $query->offset($pages->offset)->limit($pages->limit)->asArray()->all();
	}


    /**
     * Delete image
     * @param $id
     * @param $name
     * @return bool
     */
	public static function deleteImage($id, $name)
	{
		unlink(Yii::getAlias('@web') . '/media/'. $name);

		Media::deleteAll('id = '.$id);

		return true;
	}

    public function uploadImage($file)
    {
        $name = md5(time()) . '.' . pathinfo($file->name, PATHINFO_EXTENSION);
        if( $file->saveAs( Yii::getAlias('@web') . 'uploads/images/' . $name ) )
        {
            $image = new Media();
            $image->name = $name;


            $image->save();
        }
    }


    public static function getImagesLibrary($counter){
        $result = array();
        $query = Media::find()->offset($counter*12)->limit(12)->all();
        Yii::$app->response->format = Response::FORMAT_JSON;
        foreach ($query as $image){
            $result[0] .= '<div class="media-image"><img class="media-selected" src="/uploads/images/'.$image['name'].'" data-imageid="'.$image['id'].'" title="title"></div>';
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
