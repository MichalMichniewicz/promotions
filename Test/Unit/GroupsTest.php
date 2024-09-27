<?php
declare(strict_types=1);

namespace BigTeddies\Promotions\Test\Unit;

use BigTeddies\Promotions\Model\Groups as Custom;
use BigTeddies\Promotions\Model\ResourceModel\Groups as CustomResource;
use Magento\Framework\TestFramework\Unit\Helper\ObjectManager as ObjectManagerHelper;

class GroupsTest
{
    /**
     * @var Custom
     */
    protected $model;

    /**
     * @var CustomResource|\PHPUnit\Framework\MockObject\MockObject
     */
    protected $resourceModelMock;

    protected function setUp(): void
    {
        $objectManagerHelper = new ObjectManagerHelper($this);
        $this->resourceModelMock = $this->createMock(CustomResource::class);
        $this->model = $objectManagerHelper->getObject(
            Custom::class,
            [
                'resource' => $this->resourceModelMock
            ]
        );
    }

    public function testSave()
    {
        $this->resourceModelMock->expects($this->once())
            ->method('save')
            ->with($this->model)
            ->willReturnSelf();
        $this->assertEquals($this->model, $this->model->save());
    }

    public function testLoad()
    {
        $id = 1;
        $field = 'entity_id';
        $this->resourceModelMock->expects($this->once())
            ->method('load')
            ->with($this->model, $id, $field)
            ->willReturnSelf();
        $this->assertEquals($this->model, $this->model->load($id));
    }

    public function testDelete()
    {
        $this->resourceModelMock->expects($this->once())
            ->method('delete')
            ->with($this->model)
            ->willReturnSelf();
        $this->assertEquals($this->model, $this->model->delete());
    }

}
