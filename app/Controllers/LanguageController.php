<?php

namespace App\Controllers;

class LanguageController extends BaseController
{

    public function setLanguage()
    {
        $language = $this->request->getPost('language');
        session()->set('lang', $language);
        return $this->response->setJSON(['success' => true]);
    }
}
