<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "kategori".
 *
 * @property int $id
 * @property string $kategori
 * @property string|null $created_at
 * @property string|null $updated_at
 */
class Kategori extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'kategori';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['kategori'], 'required'],
            [['created_at', 'updated_at'], 'safe'],
            [['kategori'], 'string', 'max' => 100],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'kategori' => 'Kategori',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }
}
