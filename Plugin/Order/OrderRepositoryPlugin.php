<?php

declare(strict_types=1);

namespace Something\Awesome\Plugin\Order;

use Magento\Sales\Api\Data\OrderSearchResultInterface;
use Magento\Sales\Api\OrderRepositoryInterface;
use Magento\Sales\Model\Order;
use Something\Awesome\Model\MySpecialAttributeFactory;

class OrderRepositoryPlugin
{
    public function __construct(
        private readonly MySpecialAttributeFactory $mySpecialAttributeFactory
    ) {
    }

    public function afterGetList(
        OrderRepositoryInterface $orderRepository,
        OrderSearchResultInterface $orderSearchResult
    ) {
        if ($orderSearchResult->getTotalCount() === 0) {
            return $orderSearchResult;
        }

        $orders = $orderSearchResult->getItems();

        array_walk(
            $orders,
            function (Order $item) {
                $orderExtensionAttributes = $item->getExtensionAttributes();
                // String example
                $orderExtensionAttributes->setMySpecialStringAttribute('Something special');

                //string array example
                $orderExtensionAttributes->setMySpecialArrayAttribute(
                    ['Something awesome', 'Special', 'String array']
                );

                // some data to feed into the factory
                $mySpecialData = [
                    ['label' => 'something', 'value' => 'very special', 'reference_id' => 1234],
                    ['label' => 'something2', 'value' => 'very special2', 'reference_id' => 5678]
                ];

                $orderExtensionAttributes->setMySpecialAttribute(
                    array_map(
                        function ($specialItem) {
                            return $this->mySpecialAttributeFactory->create(['data' => $specialItem]);
                        },
                        $mySpecialData
                    )
                );
            }
        );

        return $orderSearchResult;
    }
}
