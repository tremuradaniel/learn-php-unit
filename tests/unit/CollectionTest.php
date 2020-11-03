<?php

    use PHPUnit\Framework\TestCase;

    class CollectionTest extends TestCase {
        /** @test */
        public function emptyInstantiatedCollectionReturnNoItens()
        {
            $collection = new \App\Support\Collection();

            $this->assertEmpty($collection->get());
        }

        /** @test */
        public function countIsCorrectForItemsPassedIn() {
            $collection = new \App\Support\Collection([
                'one', 'two', 'three'
            ]);

            $this->assertEquals(3, $collection->count());
        }

        /** @test */
        public function itemsReturnedMatchItemsPassedIn(): void
        {
            $collection = new \App\Support\Collection([
                'one', 'two'
            ]);

            $this->assertCount(2, $collection->get());
            $this->assertEquals($collection->get()[0], 'one');
            $this->assertEquals($collection->get()[1], 'two');
        }

        /** @test */
        public function collectionIsInstanceOfIteratorAggregate(): void
        {
            $collection = new \App\Support\Collection();
            $this->assertInstanceOf(IteratorAggregate::class, $collection);
        }

        /** @test */
        public function collectionCanBeInterated(): void
        {
            $collection = new \App\Support\Collection([
                'one', 'two', 'three'
            ]);

            $items = [];

            foreach ($collection as $item) {
                $items[] = $item;
            }

            $this->assertCount(3, $items);
            $this->assertInstanceOf(ArrayIterator::class, 
                $collection->getIterator());
        }

        /** @test */
        public function collectionCanBeMergedWithAnotherCollection(): void
        {
            $collection = new \App\Support\Collection([
                'one', 'two', 'three'
            ]);
            $collection2 = new \App\Support\Collection([
                'ten', 'neun', 'acht'
            ]);

            $newCollection = $collection->merge($collection2);

            $this->assertCount(6, $newCollection->get());
            $this->assertEquals(6, $newCollection->count());
        }

        /** @test */
        public function returnJsonEncodedItems(): void
        {
            $collection = new \App\Support\Collection([
                ['username' => 'alex'],
                ['username' => 'mann']
            ]);

            $expectedJSON = '[{"username":"alex"},{"username":"mann"}]';
            $this->assertEquals($expectedJSON, $collection->toJSON());
        }
    }
