<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "peminjaman".
 *
 * @property int $id
 * @property int|null $id_buku
 * @property string $anggota
 * @property string $tanggal_pinjam
 * @property string $tanggal_kembali
 * @property string $denda
 * @property string $status
 * @property string|null $created_at
 * @property string|null $updated_at
 *
 * @property Buku $buku
 */
class Peminjaman extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'peminjaman';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_buku'], 'integer'],
            [['anggota', 'tanggal_pinjam', 'tanggal_kembali', 'denda', 'status'], 'required'],
            [['tanggal_pinjam', 'tanggal_kembali', 'created_at', 'updated_at'], 'safe'],
            [['anggota', 'denda', 'status'], 'string', 'max' => 255],
            [['id_buku'], 'exist', 'skipOnError' => true, 'targetClass' => Buku::class, 'targetAttribute' => ['id_buku' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'id_buku' => 'Judul Buku',
            'anggota' => 'Anggota',
            'tanggal_pinjam' => 'Tanggal Pinjam',
            'tanggal_kembali' => 'Tanggal Kembali',
            'denda' => 'Denda',
            'status' => 'Status',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }

    /**
     * Gets query for [[Buku]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getBuku()
    {
        return $this->hasOne(Buku::class, ['id' => 'id_buku']);
    }
}
