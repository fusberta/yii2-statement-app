<?php

namespace app\models;

/**
 * This is the model class for table "users".
 *
 * @property int $user_id
 * @property string $username
 * @property string $email
 * @property string $password
 * @property string $full_name
 * @property string $phone
 * @property boolean $isAdmin
 *
 * @property Statement[] $statement
 */
class User extends \yii\db\ActiveRecord implements \yii\web\IdentityInterface
{
    public $isGuest;
    public $id;
    public $authKey;
    public $accessToken;

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'User';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['username', 'email', 'password', 'full_name', 'phone'], 'required'],
            [['username', 'email'], 'string', 'max' => 50],
            [['full_name'], 'string', 'max' => 100],
            [['phone'], 'string', 'max' => 20],
            [['password'], 'string', 'max' => 255],
            // [['username'], 'unique'],
        ];
    }
/**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'user_id' => 'ID пользователя',
            'username' => 'Логин',
            'email' => 'Адрес электронной почты',
            'password' => 'Пароль',
            'full_name' => 'ФИО',
            'phone' => 'Номер телефона',
            'confirm_password' => 'Подтвердите пароль',
            'isAdmin' => 'isAdmin',
        ];
    }

    public static function findIdentity($id)
    {
        return static::findOne($id);
    }

    /**
     * {@inheritdoc}
     */
    public static function findIdentityByAccessToken(
        $token,
        $type =
        null
    ) {
        return static::findOne(['access_token' => $token]);
    }

    /**
     * {@inheritdoc}
     */
    public function getId()
    {
        return $this->user_id;
    }

    /**
     * {@inheritdoc}
     */
    public function getAuthKey()
    {
        return;
    }

    /**
     * {@inheritdoc}
     */
    public function validateAuthKey($authKey)
    {
        return;
    }

    /**
     * Finds user by username
     *
     * @param string $username
     * @return static|null
     */
    public static function findByUsername($username)
    {
        $userRecord = User::findOne(['username' => $username]);

        return $userRecord !== null ? $userRecord : null;
    }

    /**
     * Validates password
     *
     * @param string $password password to validate
     * @return bool if password provided is valid for current user
     */
    public function validatePassword($password)
    {
        return $this->password === $password;
    }

    public function getStatement()
    {
        return $this->hasMany(Statement::class, ['user_id' => 'user_id']);
    }
}
