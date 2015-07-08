<?php
namespace Modules\Models\Accounts;
class Groups extends \Phalcon\Mvc\Model
{

    /**
     *
     * @var integer
     */
    public $id;

    /**
     *
     * @var integer
     */
    public $name;

    /**
     *
     * @var integer
     */
    public $status;

    /**
     *
     * @var string
     */
    public $created;

    /**
     *
     * @var string
     */
    public $created_gmt;

    /**
     *
     * @var string
     */
    public $modified;

    /**
     *
     * @var string
     */
    public $modified_gmt;

    /**
     * Initialize method for model.
     */
    public function initialize()
    {
        $this->hasMany('id', 'Permissions', 'group_id', array('alias' => 'Permissions'));
        $this->hasMany('id', 'UserGroup', 'group_id', array('alias' => 'UserGroup'));
    }

    /**
     * Returns table name mapped in the model.
     *
     * @return string
     */
    public function getSource()
    {
        return 'groups';
    }

    /**
     * Allows to query a set of records that match the specified conditions
     *
     * @param mixed $parameters
     * @return Groups[]
     */
    public static function find($parameters = null)
    {
        return parent::find($parameters);
    }

    /**
     * Allows to query the first record that match the specified conditions
     *
     * @param mixed $parameters
     * @return Groups
     */
    public static function findFirst($parameters = null)
    {
        return parent::findFirst($parameters);
    }

}
