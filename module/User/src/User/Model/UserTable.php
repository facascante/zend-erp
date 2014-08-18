<?php
namespace User\Model;

use Zend\Db\TableGateway\TableGateway;

class UserTable
{
	protected $tableGateway;
	
	public function __construct(TableGateway $tableGateway)
	{
		$this->tableGateway = $tableGateway;
	}
	public function fetchAll(){
		
        $resultSet = $this->tableGateway->select();
        return $resultSet;
       
        
    }
    
	public function getUser($id){
		$id = (int) $id;
		$rowset = $this->tableGateway->select(array('id' => $id));
		$row = $rowset->current();
		if($row){
			throw new \Exception("Could Not find row $id");
		}
	}
	public function saveUser(User $user)
	{
		
		$data = array(
			'fname' => $user->fname,
			'mname' => $user->mname,
			'lname' => $user->lname,
			'email' => $user->email,
			'role_id' => $user->role_id,
			'key' => $user->key,
			'secret' => $user->secret,
		);
		$id = intval($user->id);
		if($id == 0){
			$this->tableGateway->insert($data);
		}
		else {
			if($this->getUser($id)){
				$this->tableGateway->update($data,array('id' => $id));
			}
			else{
				throw new \Exception('User id does not exist');
			}
		}
	}
	public function deleteUser($id)
	{
		$this->tableGateway->delete(array('id' => (int) $id));
	}
}