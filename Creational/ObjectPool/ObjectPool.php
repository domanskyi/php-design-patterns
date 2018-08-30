<?php

class Worker
{
    private $created;

    public function __construct() {
        $this->created = date("Y-m-d H:i:s");
    }

    public function work($val1, $val2) {
        return $val1 * $val2;
    }
}

class WorkersPool
{
    private $occupiedWorkers = [];
    private $freeWorkers = [];

    public function get() {
        if (count($this->freeWorkers) == 0) {
            $worker = new Worker();
        } else {
            $worker = array_pop($this->freeWorkers);
        }

        $this->occupiedWorkers[spl_object_hash($worker)] = $worker;
        
        return $worker;
    }

    public function dispose(Worker $worker) {
        $key = spl_object_hash($worker);

        if (isset($this->occupiedWorkers[$key])) {
            unset($this->occupiedWorkers[$key]);
            $this->freeWorkers[$key] = $worker;
        }
    }

    public function count() {
        return count($this->occupiedWorkers) + count($this->freeWorkers);
    }

    public function countOccupiedWorkers() {
        return count($this->occupiedWorkers);
    }

    public function countFreeWorkers() {
        return count($this->freeWorkers);
    }
}

$pool = new WorkersPool;

echo $pool->count(); //0

$worker1 = $pool->get();
$worker2 = $pool->get();

echo $pool->countOccupiedWorkers(); //2
echo $pool->countFreeWorkers(); //0

$pool->dispose($worker1);

echo $pool->countOccupiedWorkers(); //1
echo $pool->countFreeWorkers(); //1

echo $worker1->work(7, 7); //ТУТ ТАК І МАЄ БУТИ? Тобто, коли ми повертаємо воркера він по ідеї має стати недоступним?


$worker3 = $pool->get();
echo $pool->count(); //2
?>