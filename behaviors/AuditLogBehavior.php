<?php
namespace ddmtechdev\auditlog\behaviors;

use Yii;
use yii\base\Behavior;
use yii\db\ActiveRecord;
use ddmtechdev\auditlog\models\AuditLog;

class AuditLogBehavior extends Behavior
{
    public function events()
    {
        return [
            ActiveRecord::EVENT_AFTER_INSERT => 'logInsert',
            ActiveRecord::EVENT_AFTER_UPDATE => 'logUpdate',
            ActiveRecord::EVENT_BEFORE_DELETE => 'logDelete',
        ];
    }

    protected function log($action, $changes = null)
    {
        $model = $this->owner;
        $log = new AuditLog([
            'user_id' => Yii::$app->user->id ?? null,
            'model' => get_class($model),
            'model_id' => $model->primaryKey,
            'action' => $action,
            'changes' => $changes ? json_encode($changes) : null,
        ]);
        $log->save(false);
    }

    public function logInsert()
    {
        $this->log('insert');
    }

    public function logUpdate()
    {
        $changes = [];
        foreach ($this->owner->dirtyAttributes as $attribute => $newValue) {
            $changes[$attribute] = [
                'old' => $this->owner->getOldAttribute($attribute),
                'new' => $newValue,
            ];
        }
        $this->log('update', $changes);
    }

    public function logDelete()
    {
        $this->log('delete');
    }
}
