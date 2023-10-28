<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "kembali".
 *
 * @property int $kembali_id
 * @property string $buku_id
 * @property string $tanggal_kembali
 */
class Kembali extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'kembali';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['buku_id', 'tanggal_kembali'], 'required'],
            [['buku_id', 'tanggal_kembali'], 'string', 'max' => 100],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'kembali_id' => 'Kembali ID',
            'buku_id' => 'Buku ID',
            'tanggal_kembali' => 'Tanggal Kembali',
        ];
    }
}
