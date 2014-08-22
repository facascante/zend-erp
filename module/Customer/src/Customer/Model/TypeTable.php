<?php

namespace Customer\Model;

use Zend\Db\TableGateway\TableGateway;

class TypeTable
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
	public function getCategory($id){
		$id = (int) $id;
		$rowset = $this->tableGateway->select(array('id' => $id));
		$row = $rowset->current();
		if($row){
			throw new \Exception("Could Not find row $id");
		}
	}

	public function saveType(Type $type)
	{
		
		$data = array(
			'name' => $type->name,
		);
		$id = intval($type->id);
		if($id == 0){
			$this->tableGateway->insert($data);
		}
		else {
			if($this->getType($id)){
				$this->tableGateway->update($data,array('id' => $id));
			}
			else{
				throw new \Exception('Type id does not exist');
			}
		}
	}
	public function deleteType($id)
	{
		$this->tableGateway->delete(array('id' => (int) $id));
	}
}