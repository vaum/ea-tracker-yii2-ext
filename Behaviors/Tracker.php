<?php

namespace vaum\Behaviors;

use yii\db\ActiveRecord;
use yii\base\Behavior;

class Tracker extends Behavior
{

    public function events()
    {
        return [
            ActiveRecord::EVENT_AFTER_INSERT => 'insert',
            ActiveRecord::EVENT_AFTER_UPDATE => 'update',
            ActiveRecord::EVENT_AFTER_DELETE => 'delete',
        ];
    }


    public function insert($event)
    {
        $model = new \vaum\Entities\Tracker($this->owner);
        $model->setEntry($event->name);
        return $model->save();
    }

    public function update($event)
    {
        $model = new \vaum\Entities\Tracker($this->owner);
        $model->setEntry($event->name);
        return $model->save();
    }

    public function delete($event)
    {
        $model = new \vaum\Entities\Tracker($this->owner);
        $model->setEntry($event->name);
        return $model->save();
    }

}