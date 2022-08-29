<?php
return [
    'SuperAdminRoleId' => -1021,
    'SuperAdminUserId' => 1,
    'UserTypeIds' => [
        'SuperAdmin' => -10021,
        'Admin' => -10022,
        'Company' => -10023,
        'Member' => -10024,
    ],
    'UserRoleIds' => [
        'SuperAdmin' => 1,
        'Admin' => 2,
        'Company' => 3,
        'Member' => 4,
    ],
    'imagetypes' => [
        'jpeg' => 'jpeg',
        'jpg' => 'jpg',
        'png' => 'png',
    ],
    'docandimgetypes' => [
        'jpeg' => 'jpeg',
        'jpg' => 'jpg',
        'png' => 'png',
        'spreadsheetml' => 'xlsx',
        'powerpoint' => 'pptx',
        'ms-excel' => 'xls',
        'docx' => 'docx',
        'doc' => 'doc',
        'pdf' => 'pdf',
        'html' => 'html',
      
    ],
    'attachment_paths' => [
        'events' => "/uploads/events/", // last slash is mandatory
        'eventsGallery' => "/uploads/events/gallery/", // last slash is mandatory
        'ProfilePicture' => "/uploads/member/profile_picture/", // last slash is mandatory
        'TutorialVideo' => "/uploads/member/tutorial_videos/",
        'TractorImages' => "/uploads/Tractors/TractorsImages/",
        'TractorMannuals' => "/uploads/Tractors/TractorMannuals/",
        'GalleryVideo' => "/uploads/GalleryVideo/",
        'TourImages' => "/uploads/TourImages/",
        'LunchIcons' => "/uploads/LunchIcons/",
        'ExpenseFile' => "/uploads/ExpenseFile/",
        'MotivationalQuote' => "/uploads/MotivationalQuote/",

    ],
    
    'Order_master_status' => [
        'pending' => "pending",
        'preparation' => "preparation",
        'ready' => "ready",
        'delivered' => "delivered",
        'reject' => "reject",
    ],
    'filter_tag_types' => [
        'price' => -10001,
        'rating' => -10002,
        'distance' => -10003,
        'offer' => -10004,
        'types' => -10005,
    ],
    'configkeys' => [
        'support_email' => 'support_email',
        'support_number' => 'support_number',
    ],
    'EventTypes' => [
        'rooms' => 'rooms',
        'tables' => 'tables',
        'time_slots' => 'time_slots',
        'business' => 'business',
    ],
    
    'stripe'=>[
        'key' => 'pk_test_51I1q96IMrzFWveTsUGVGnhTHW81k3dui2peamazriZHa5Ji8YEg9jCK9ZUdQj4zv8woKrRclCrbin6srsy6hBmAv00j8O6KuZe',
        'secret' => 'sk_test_51I1q96IMrzFWveTsdJXKpDMgptBV4vrzmMpLT3WOfH40MAOCi9KGBqZx3MVexMB0m6FGy3K31MorxWrcfJpKosch00RFXxCYWp'
    ],
    'ParentEventTypes'=>[
        'business_event'=> '-5552',
        'general_event'=> '-5551',
    ],
    "ReportUrl" => "/admin/report",
];