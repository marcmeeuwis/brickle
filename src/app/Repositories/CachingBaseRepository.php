<?php

namespace Doitonlinemedia\Admin\App\Repositories;

use Illuminate\Contracts\Cache\Repository as Cache;

class CachingBaseRepository implements BaseRepository
{
    
    private $baseRepository;
    private $cache;
    private $modelName;
    public function __construct(BaseRepository $baseRepository, Cache $cache)
    {
        $this->baseRepository = $baseRepository;    
        $this->cache = $cache; 
        $this->modelName = get_class($this->baseRepository->model);   
    }    
    
    public function all()
    {
        return $this->cache->rememberForever($this->modelName . '.all', function(){
            return $this->baseRepository->all();
        });
    }
    
    public function paginated($paged = 15, $orderBy = 'created_at', $sort = 'DECS')
    {
        return $this->baseRepository->paginated($paged, $orderBy, $sort);
    }
    public function forSelect($data, $key = 'id', $orderBy = 'created_at', $sort = 'DECS')
    {
        return $this->baseRepository->forSelect($data, $key, $orderBy, $sort);    
    }
    public function byId($id)
    {
        return $this->baseRepository->byId($id);
    }
    public function itemByColumn($term, $column = 'slug')
    {
        return $this->baseRepository->itemByColumn($term, $column);
    }
    public function collectionByColumn($term, $column = 'slug')
    {
        return $this->baseRepository->collectionByColumn($term, $column);
    }
    public function actively($term, $column = 'slug')
    {
        return $this->baseRepository->actively($term, $column);
    }
    public function create(array $data)
    {
        return $this->baseRepository->create($data);
    }
    public function update($id, array $data)
    {
        return $this->baseRepository->update($id, $data);
    }
    public function updateOrCreate(array $identifiers, array $data)
    {
        return $this->baseRepository->updateOrCreate($identifiers, $data);
    }
    public function delete($id)
    {
        return $this->baseRepository->delete($id);
    }
    public function with($relationships)
    {
        return $this->baseRepository->with($relationships);
    }
}



?>
