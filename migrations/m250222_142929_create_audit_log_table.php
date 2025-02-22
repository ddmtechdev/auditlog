<?php

use yii\db\Migration;

class m250222_142929_create_audit_log_table extends Migration
{
    public function safeUp()
    {
        $this->createTable('{{%audit_log}}', [
            'id' => $this->primaryKey(),
            'user_id' => $this->integer()->null(),
            'model' => $this->string()->notNull(),
            'model_id' => $this->integer()->notNull(),
            'action' => "ENUM('insert', 'update', 'delete') NOT NULL",
            'changes' => $this->text()->null(),
            'created_at' => $this->timestamp()->defaultExpression('CURRENT_TIMESTAMP'),
        ]);

        // Add indexes
        $this->createIndex('idx-audit_log-user_id', '{{%audit_log}}', 'user_id');
        $this->createIndex('idx-audit_log-model_id', '{{%audit_log}}', ['model', 'model_id']);
    }

    public function safeDown()
    {
        $this->dropTable('{{%audit_log}}');
    }
}
