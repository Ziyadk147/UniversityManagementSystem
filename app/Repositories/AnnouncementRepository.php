<?php

namespace App\Repositories;

use App\Interfaces\AnnouncementInterface;
use App\Models\Announcement;

class AnnouncementRepository implements AnnouncementInterface
{
    protected $announcement;
    public function __construct(Announcement $announcement)
    {
        $this->announcement = $announcement;
    }
    public function getAllAnnouncements()
    {
        return $this->announcement->all();
    }
    public function getTop5Announcements()
    {
        return $this->announcement->latest()->take(5)->get()->reverse();
    }

    public function getAnnouncementById($id)
    {
        return $this->announcement->find($id);
    }
    public function storeAnnouncement($request)
    {
        return $this->announcement->create($request);
    }

}
