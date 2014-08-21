<?php

namespace Customer\Model;

use Zend\Db\TableGateway\TableGateway;

class RoleTable
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
    public function fetchSelectOption(){
	
    	$resultSet = $this->tableGateway->select();
    	$selectData = array();
 
        foreach ($resultSet as $result) {
            $selectData[$result->id] = $result->name;
        }
        
        return $selectData;
    }
	public function getRole($id){
		$id = (int) $id;
		$rowset = $this->tableGateway->select(array('id' => $id));
		$row = $rowset->current();
		if($row){
			throw new \Exception("Could Not find row $id");
		}
	}

	public function saveCategory(Category $category)
	{
		
		$data = array(
			'name' => $category->name,
		);
		$id = intval($category->id);
		if($id == 0){
			$this->tableGateway->insert($data);
		}
		else {
			if($this->getCategory($id)){
				$this->tableGateway->update($data,array('id' => $id));
			}
			else{
				throw new \Exception('Category id does not exist');
			}
		}
	}
	public function deleteRole($id)
	{
		$this->tableGateway->delete(array('id' => (int) $id));
	}
}