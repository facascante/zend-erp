<?php
namespace Product\Model;

use Zend\Db\TableGateway\TableGateway;

class UOMTable
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


	public function getUOM($id){
		$id = (int) $id;
		$rowset = $this->tableGateway->select(array('id' => $id));
		$row = $rowset->current();
		if($row){
			throw new \Exception("Could Not find row $id");
		}
	}

	public function saveUOM(UOM $uom)
	{
		$data = array(
			'name' => $uom->name,
			'uom' => $uom->uom,
        );
        $id = intval($uom->id);
        if($id == 0){
            $this->tableGateway->insert($data);
        }
        else {
            if($this->getUOM($id)){
                $this->tableGateway->update($data,array('id' => $id));
			}
			else{
				throw new \Exception('UOM id does not exist');
			}
		}
	}
	public function deleteUOM($id)
	{
		$this->tableGateway->delete(array('id' => (int) $id));
	}
}