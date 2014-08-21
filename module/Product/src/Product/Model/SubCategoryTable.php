<?php
namespace Product\Model;

use Zend\Db\TableGateway\TableGateway;

class SubCategoryTable
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


	public function getSubCategory($id){
		$id = (int) $id;
		$rowset = $this->tableGateway->select(array('id' => $id));
		$row = $rowset->current();
		if($row){
			throw new \Exception("Could Not find row $id");
		}
	}

	public function saveSubCategory(SubCategory $subcategory)
	{
		$data = array(
			'name' => $subcategory->name,
			'category' => $subcategory->category,
        );
        $id = intval($subcategory->id);
        if($id == 0){
            $this->tableGateway->insert($data);
        }
        else {
            if($this->getSubCategory($id)){
                $this->tableGateway->update($data,array('id' => $id));
			}
			else{
				throw new \Exception('Category id does not exist');
			}
		}
	}
	public function deleteSubCategory($id)
	{
		$this->tableGateway->delete(array('id' => (int) $id));
	}
}