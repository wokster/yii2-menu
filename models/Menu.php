<?php

namespace wokster\menu\models;

use Yii;

/**
 * This is the model class for table "menu".
 *
 * @property integer $id
 * @property string $title
 * @property string $url
 * @property integer $sort
 * @property integer $parent_id
*/
class Menu extends \yii\db\ActiveRecord
{


    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'menu';
    }

    /**
    * @inheritdoc
    */
    public function behaviors()
    {
        return [
        ];
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['title', 'url'], 'required'],
            [['sort','parent_id'], 'integer'],
            [['parent_id'], 'default','value'=> 0],
            [['title', 'url'], 'string', 'max' => 255],
            [['sort'], 'number', 'min'=>'-1', 'max'=>'99' ]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => 'Title',
            'url' => 'Url',
            'sort' => 'Sort',
            'visibility' => 'Видимость',
            'parent_id' => 'Категория',
        ];
    }
    public function getVisibility(){
        if($this->sort < 0){
            return 'Скрыт';
            }
            return 'Отображается';

        }
}

