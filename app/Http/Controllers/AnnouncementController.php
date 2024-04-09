<?php

namespace App\Http\Controllers;

use App\Models\Announcement;
use App\Models\User;
use App\Services\AnnouncementService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AnnouncementController extends Controller
{
    protected $announcementService;
    public function __construct(AnnouncementService $announcementService)
    {
        $this->announcementService = $announcementService;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $announcements = $this->announcementService->getTop5Announcement();
        return view('announcement.index' , compact('announcements'));
    }

    public function historical()
    {
        $announcements = $this->announcementService->getAllAnnouncement();
        return view('announcement.historical' , compact('announcements'));
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $announcement = $this->announcementService->storeAnnouncement($request);
        return response(['status' => 200 , 'data' => $announcement]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $announcement = $this->announcementService->findAnnouncementById($id)->delete();
        return to_route('announcement.historical');
    }
}
