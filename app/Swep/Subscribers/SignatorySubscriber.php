<?php 

namespace App\Swep\Subscribers;


use App\Swep\BaseClasses\BaseSubscriber;



class SignatorySubscriber extends BaseSubscriber{


    

    public function __construct(){

        parent::__construct();

    }




    public function subscribe($events){

        $events->listen('signatory.store', 'App\Swep\Subscribers\SignatorySubscriber@onStore');
        $events->listen('signatory.update', 'App\Swep\Subscribers\SignatorySubscriber@onUpdate');
        $events->listen('signatory.destroy', 'App\Swep\Subscribers\SignatorySubscriber@onDestroy');

    }





    public function onStore(){

        $this->__cache->deletePattern(''. config('app.name') .'_cache:signatories:fetch:*');
        $this->__cache->deletePattern(''. config('app.name') .'_cache:signatories:getAll');

        $this->session->flash('SIGNATORY_CREATE_SUCCESS', 'The Signatory has been successfully created!');

    }





    public function onUpdate($signatory){

        $this->__cache->deletePattern(''. config('app.name') .'_cache:signatories:fetch:*');
        $this->__cache->deletePattern(''. config('app.name') .'_cache:signatories:getAll');
        $this->__cache->deletePattern(''. config('app.name') .'_cache:signatories:findByType:'. $signatory->type .'');
        $this->__cache->deletePattern(''. config('app.name') .'_cache:signatories:findBySlug:'. $signatory->slug .'');
        $this->session->flash('SIGNATORY_UPDATE_SUCCESS', 'The Signatory has been successfully updated!');
        $this->session->flash('SIGNATORY_UPDATE_SUCCESS_SLUG', $signatory->slug);

    }





    public function onDestroy($signatory){

        $this->__cache->deletePattern(''. config('app.name') .'_cache:signatories:fetch:*');
        $this->__cache->deletePattern(''. config('app.name') .'_cache:signatories:getAll');
        $this->__cache->deletePattern(''. config('app.name') .'_cache:signatories:findByType:'. $signatory->type .'');
        $this->__cache->deletePattern(''. config('app.name') .'_cache:signatories:findBySlug:'. $signatory->slug .'');

        $this->session->flash('SIGNATORY_DELETE_SUCCESS', 'The Signatory has been successfully deleted!');

    }





}