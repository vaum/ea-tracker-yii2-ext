<?php

namespace vaum\Entities;



use yii\db\ActiveRecord;

/**
 * This is the model class for table "{{%tracker}}".
 *
 * @property int $id
 * @property string $event
 * @property int $modelId
 * @property string $modelType
 * @property string $newAttributes
 * @property string $oldAttributes
 * @property int $userId
 */

class Tracker extends ActiveRecord
{

    public $model;

    public static function tableName()
    {
        return '{{%tracker}}';
    }


    public function rules()
    {
        return [
            [['event', 'modelType', 'oldAttributes', 'newAttributes'], 'string'],
            [['oldAttributes', 'newAttributes'], 'default' => null],
            [['modelId', 'userId'], 'integer']
        ];
    }

    public function __construct($model, array $config = [])
    {
        $this->model = $model;
        parent::__construct($config);
    }

    public function setEntry($eventName)
    {
        $this->event = $eventName;
        $this->modelId = $this->model->id;
        $this->modelType = $this->model->classname;
        $this->oldAttributes = $this->model->oldAttributes;
        $this->newAttributes = $this->model->attributes;
        $this->userId = \Yii::$app->getUser()->id ?? null;
    }
}
