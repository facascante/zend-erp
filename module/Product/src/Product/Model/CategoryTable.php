<?php
namespace Product\Model;

use Zend\Db\TableGateway\TableGateway;

class CategoryTable
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
    
	public function getProduct($id){
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
			'item_code' => $category->item_code,

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
				throw new \Exception('Product id does not exist');
			}
		}
	}
	public function deleteCategory($id)
	{
		$this->tableGateway->delete(array('id' => (int) $id));
	}
}