<?php

class VideoCastCollectionsGetListProcessor extends modObjectGetListProcessor
{
    public $classKey = 'vcCollection';
    public $languageTopics = ['default', 'videocast:default'];
    public $defaultSortField = 'rank';
    public $defaultSortDirection = 'ASC';

    /** @var VideoCast */
    protected $vc;

    /**
     * @param xPDOQuery $c
     * @return xPDOQuery
     */
    public function prepareQueryBeforeCount(xPDOQuery $c)
    {
        if ($this->getProperty('combo')) {
            $c->select(['id', 'title']);
        } else {
            $c->select([
                'vcCollection.*',
                'duration' => 'SUM(vcVideo.duration)',
                'videos' => 'COUNT(vcVideo.id)'
            ]);
            $c->leftJoin('vcVideo', 'vcVideo', ['vcVideo.collection = `vcCollection`.`id`']);
            $c->groupby('vcCollection.id');
        }

        return $c;
    }

    /**
     * @return bool
     */
    public function initialize()
    {
        $this->vc = $this->modx->getService('VideoCast');

        return parent::initialize();
    }

}

return VideoCastCollectionsGetListProcessor::class;
