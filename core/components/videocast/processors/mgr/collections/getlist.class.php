<?php

class VideoCastCollectionsGetListProcessor extends modObjectGetListProcessor
{
    public $classKey = 'vcCollection';
    public $languageTopics = ['default', 'videocast:default'];
    public $defaultSortField = 'id';
    public $defaultSortDirection = 'ASC';
    //public $permission = 'vcvideo_list';

    /** @var VideoCast */
    protected $vc;

    /**
     * @return bool
     */
    public function initialize()
    {
        $this->vc = $this->modx->getService('VideoCast');

//        if (!$this->modx->hasPermission($this->permission)) {
//            return $this->modx->lexicon('access_denied');
//        }

        return parent::initialize();
    }

}

return VideoCastCollectionsGetListProcessor::class;
