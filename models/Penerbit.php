<?php

namespace app\models;

use yii\helpers\ArrayHelper;
use Yii;

/**
 * This is the model class for table "publishers".
 *
 * @property int $id
 * @property string $nama
 * @property string $alamat
 * @property string $telepon
 * @property string $email
 * @property string|null $created_at
 * @property string|null $updated_at
 */
class Penerbit extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'penerbit';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nama', 'alamat', 'telepon', 'email'], 'required'],
            [['created_at', 'updated_at'], 'safe'],
            [['nama', 'alamat', 'telepon', 'email'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'nama' => 'Nama',
            'alamat' => 'Alamat',
            'telepon' => 'Telepon',
            'email' => 'Email',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }

    public function getBooks()
    {
        return $this->hasMany(Book::class, ['id_penerbit' => 'id']);
    }

     public static function getAllPenerbit()
    {
        $penerbit = Penerbit::find()->all();
        $penerbit = ArrayHelper::map($penerbit, 'id', 'nama');
        return $penerbit;
    }

    public static function getCount()
    {
        return static::find()->count();
    }
}
