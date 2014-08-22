<?php

namespace User\Model;

use Zend\Db\TableGateway\TableGateway;

class StatusTable
{
	protected $tableGateway;
	
	public function __construct(TableGateway $tableGateway)
	{
		$this->tableGateway = $tableGateway;
	}
	public function fetchAll(){
		
        $resultSet = $this->tableGateway->select(array('category' => 'User'));
        return $resultSet;
    }
    public function fetchSelectOption(){
	
    	$resultSet = $this->tableGateway->select(array('category' => 'User'));
    	$selectData = array();
 
        foreach ($resultSet as $result) {
            $selectData[$result->id] = $result->name;
        }
        
        return $selectData;
    }
	public function getStatus($id){
		$id = (int) $id;
		$rowset = $this->tableGateway->select(array('id' => $id));
		$row = $rowset->current();
		if($row){
			throw new \Exception("Could Not find row $id");
		}
	}

	public function saveStatus(Status $status)
	{
		
		$data = array(
			'name' => $status->name,
		);
		$id = intval($status->id);
		if($id == 0){
			$this->tableGateway->insert($data);
		}
		else {
			if($this->getStatus($id)){
				$this->tableGateway->update($data,array('id' => $id));
			}
			else{
				throw new \Exception('Status id does not exist');
			}
		}
	}
	public function deleteStatus($id)
	{
		$this->tableGateway->delete(array('id' => (int) $id));
	}
}