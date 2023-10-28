<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "buku".
 *
 * @property string $buku_id
 * @property string $judul_buku
 * @property string $status
 */
class Buku extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'buku';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['buku_id', 'judul_buku'], 'required'],
            [['status'], 'string'],
            [['buku_id', 'judul_buku'], 'string', 'max' => 100],
            [['buku_id'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'buku_id' => 'Buku ID',
            'judul_buku' => 'Judul Buku',
            'status' => 'Status',
        ];
    }
}
