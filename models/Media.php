<?php

namespace app\models;

use Yii;
use yii\db\ActiveRecord;
use yii\data\Pagination;

class Media extends ActiveRecord{


    /**
     * Get count of all images
     */
	public function getTotalCount()
	{
		return Media::find()->where([])->count();
	}


    /**
     * Get images for admin panel
     */
	public function getImages($pages)
	{
		$query = Media::find()->select(['id','image']);
	    $countQuery = clone $query;
	    $pages = new Pagination(['totalCount' => $countQuery->count()]);
	    return $query->offset($pages->offset)->limit($pages->limit)->asArray()->all();
	}


    /**
     * Delete image
     */
	public function deleteImage($id, $name)
	{
		unlink(Yii::getAlias('@web') . '/media/'. $name);

		Media::deleteAll('id = '.$id);

		return true;
	}


}
