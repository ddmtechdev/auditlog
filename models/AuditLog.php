<?php
namespace ddmtechdev\auditlog\models;

use Yii;
use yii\db\ActiveRecord;

class AuditLog extends ActiveRecord
{
    public static function tableName()
    {
        return '{{%audit_log}}';
    }
}
