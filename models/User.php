<?php

namespace app\models;

use Yii;
use yii2tech\ar\softdelete\SoftDeleteBehavior;



/**
 * This is the model class for table "user".
 *
 * @property integer $id
 * @property integer $role
 * @property string $kode_pegawai
 * @property string $username
 * @property string $password
 * @property string $nama
 * @property string $email
 * @property string $auth_key
 * @property string $access_token
 *
 * @property Pegawai $kodePegawai
 */
class User extends \yii\db\ActiveRecord implements \yii\web\IdentityInterface
{
    const ROLE_ADMIN = 1;
    const ROLE_PETUGAS = 2;
    const ROLE_ANGGOTA = 3;

    public $auth_key;
    public $role;
    public $access_token;

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'user';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_user_role','username', 'password'], 'required'],
            [['id_user_role'], 'integer'],
            [['auth_key', 'access_token'], 'string', 'max' => 255],
            [['id_anggota','id_petugas','id_admin'], 'integer'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'id_user_role' => 'User Role',
            //'kode_pegawai' => 'Kode Pegawai',
            'username' => 'Username',
            'password' => 'Password',
            //'nama' => 'Nama',
            //'email' => 'Email',
            'auth_key' => 'Auth Key',
            'access_token' => 'Access Token',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */


    /**
     * @inheritdoc
     */
    public static function findIdentity($id)
    {
        return static::findOne($id);
    }

    /**
     * @inheritdoc
     */
    public static function findIdentityByAccessToken($token, $type = null)
    {
        return static::findOne(['access_token' => $token]);
    }

    /**
     * @inheritdoc
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @inheritdoc
     */
    public function getAuthKey()
    {
        return $this->auth_key;
    }

    /**
     * @inheritdoc
     */
    public function validateAuthKey($authKey)
    {
        return $this->auth_key === $authKey;
    }

    /**
     * Finds user by username
     *
     * @param string $username
     * @return static|null
     */
    public static function findByUsername($username)
    {
        return static::findOne(['username' => $username]);
    }

    /**
     * Validates password
     *
     * @param string $password password to validate
     * @return boolean if password provided is valid for current user
     */
    public function validatePassword($password)
    {
        return Yii::$app->getSecurity()->validatePassword($password, $this->password);
    }

    public function getRole()
    {
        if ($this->role === self::ROLE_ADMIN) {
            return 'Admin';
        } elseif ($this->role === self::ROLE_PETUGAS) {
            return 'Petugas';
        } {
            return 'Anggota';
        }
    }

    public static function isAdmin()
    {
        if(@Yii::$app->user->identity->id_user_role == User::ROLE_ADMIN){
            return true;
        }

        return false;

    }

    public static function isPetugas()
    {
        if(@Yii::$app->user->identity->id_user_role == User::ROLE_PETUGAS){
            return true;
        }

        return false;
    }

    public static function isAnggota()
    {
        if(@Yii::$app->user->identity->id_user_role == User::ROLE_ANGGOTA){
            return true;
        }

        return false;
    }

    public static function getIdAnggota()
    {
        return @Yii::$app->user->identity->id_anggota;
    }

    public static function getRoleList()
    {
        return [
            self::ROLE_ADMIN => 'Admin',
            self::ROLE_ANGGOTA => 'Anggota',
            self::ROLE_PETUGAS => 'Petugas',
        ];
    }

    public static function getCount($params = [])
    {
        return static::where($params)->count();
    }

    public function getUserRole()
    {
        return $this->hasOne(UserRole::class,['id'=>'id_user_role']);
    }

    public function getAnggota()
    {
       return $this->hasOne(Anggota::class, ['id' => 'id_anggota']);
    }

    public function getPetugas()
    {
       return $this->hasOne(Petugas::class, ['id' => 'id_petugas']);
    }

    public function getAdmin()
    {
       return $this->hasOne(Admin::class, ['id' => 'id_admin']);
    }
}
