<?php

namespace Doitonlinemedia\Admin\App\Repositories\Document;

use Doitonlinemedia\Admin\App\Models\DocumentSettings;
use Doitonlinemedia\Admin\App\Repositories\BaseRepository;
use Auth;

class DocumentRepository extends BaseRepository
{
    protected $model = 'Doitonlinemedia\Admin\App\Models\Document';

    public $requiredRelationships = ['settings'];

    public function getByLevel($level = 0) {
        return $this->model->select('documents.*', 'level')->with($this->model->requiredRelationships)->join('document_settings', 'document_settings.document_id', '=', 'documents.id')->where('level', $level)->get();
    }

    public function update($document, $name, $slug)
    {
        $document->name = $name;
        $document->slug = $slug;
        $document->save();

        return $document;
    }

    public function store($name, $slug, $document_type_id, $parent) {

     //   dd($this->model);
        $document = $this->model->create([
            'name' => ucfirst($name),
            'slug' => $slug,
            'published_date' => date("Y-m-d H:i:s"),
            'document_type_id' => $document_type_id,
            'user_id' => Auth::user()->id,
            'parent_id' => ($parent) ? $parent->id : null,
            'template_id' => 1
        ]);

        DocumentSettings::create([
            'deletable' => 1,
            'trashed' => 0,
            'level' => ($parent) ? $parent->level + 1 : 0,
            'document_id' => $document->id,
            'trashed' => 0,
        ]);

        return $document;
    }





//    public function __construct(Document $document, DocumentSettings $settings)
//    {
//        $this->document = $document;
//        $this->settings = $settings;
//    }

//    public function all() {
//        Cache::forget('documents');
//        return Cache::rememberForever('documents', function() {
//            return $this->document->with('settings')->get();
//        });
//    }

//    public function getAllByParentId($id) {
//
//    }
//
//    public function getAllByLevel($level) {
//        return $this->document->with('settings')->join('document_settings', 'document_id', '=', 'documents.id')->where('level', $level)->get();
//    }
//
//    public function getBySlug($slug)
//    {
//        return $this->document->where('slug', $slug)
//            ->with(array('documentType.properties', 'documentType.properties.value', 'documentType.tabs'))
//            ->first();
//    }
//
//    public function getFirstByDocumentTypeId($id)
//    {
//        return $this->document->where('id', $id)->get();
//    }
//
//    public function get($id) {
//        //return Cache::rememberForever('document_'.$id, function() use ($id) {
//            return $this->document->where('documents.id', $id)
//                ->join('document_settings', 'document_settings.document_id', '=', 'documents.id')
//                ->with(array('documentType.properties', 'values', 'documentType.tabs'))
//                ->first();
//        //});
//    }
//

//
//
//
//    public function generateUniqueSlug($name, $parent_id = 0)
//    {
//        $slug = str_slug($name);
//        $count = $this->document->join('document_settings', 'document_settings.document_id', '=', 'documents.id')->where('parent_id', $parent_id)->whereRaw("slug RLIKE '^{$slug}(-[0-9]+)?$'")->count();
//        return $count ? "{$slug}-{$count}" : $slug;
//    }
}