<?php

namespace App\Interfaces;

use http\Env\Request;

interface AnnouncementInterface
{
    public function getAllAnnouncements();

    public function getTop5Announcements();

    public function getAnnouncementById($id);

    public function storeAnnouncement($request);
}
