<?php

namespace App\Services;

use App\Providers\AnnouncementServiceProvider;
use App\Repositories\AnnouncementRepository;
use App\Repositories\UserRepository;
use Illuminate\Support\Facades\Auth;

class AnnouncementService
{
    protected $announcementRepository;
    public function __construct( AnnouncementRepository $announcementRepository)
    {
        $this->announcementRepository = $announcementRepository;
    }

    public function getAllAnnouncement()
    {
        return $this->announcementRepository->getAllAnnouncements();
    }

    public function getTop5Announcement()
    {
        return $this->announcementRepository->getTop5Announcements();
    }

    public function findAnnouncementById($id)
    {
        return $this->announcementRepository->getAnnouncementById($id);
    }

    public function storeAnnouncement($request)
    {
        $payload = [
            'text' => $request->data,
            'created_by' => Auth::id(),
            'created_by_name' => Auth::user()->name
        ];
        return $this->announcementRepository->storeAnnouncement($payload);

    }

}
