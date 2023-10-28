<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "pinjam".
 *
 * @property int $pinjam_id
 * @property string $buku_id
 * @property string $tanggal_pinjam
 * @property string $nama_peminjam
 */
class Pinjam extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'pinjam';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['buku_id', 'tanggal_pinjam', 'nama_peminjam'], 'required'],
            [['buku_id', 'tanggal_pinjam'], 'string', 'max' => 100],
            [['nama_peminjam'], 'string', 'max' => 200],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'pinjam_id' => 'Pinjam ID',
            'buku_id' => 'Buku ID',
            'tanggal_pinjam' => 'Tanggal Pinjam',
            'nama_peminjam' => 'Nama Peminjam',
        ];
    }
}
