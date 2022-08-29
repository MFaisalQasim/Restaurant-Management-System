<?php

namespace App\Helpers;

use Auth;
use Config;
use DB;
use File;
use Session;
use DateTime;
use App\User; 
use App\Models\Event; 
use App\Models\Event_reservation; 
use Illuminate\Support\Str;

class AppHelper
{
    public static function checkAppHelper()
    {
        return "AppHelper is working.";
    }

    public static function getImagePath($Attachment, $AllowedExtesionArr, $AttachmentPath, $AllowedFileSizwInMB = "2", $ExtarParams = null)
    {
        try {

            if ($Attachment == null) {
                return null;
            }
            if ($AllowedFileSizwInMB == "") {
                $AllowedFileSizwInMB = "2";
            }
            $exploded_file = explode(',', $Attachment);

            $decode_file = base64_decode($exploded_file[1]);
            $extension = "";
            foreach ($AllowedExtesionArr as $key => $value) {
                if (str_contains($exploded_file[0], $key)) {
                    $extension = $value;
                    break;
                }
            }

            if ($extension == "") {
                return array("Error" => "File type not supported. Please select these files [ " . implode(' , ', $AllowedExtesionArr) . " ].");
            }

            if ($ExtarParams != null && isset($ExtarParams["DomainPath"])) {
                $UploadDir = $ExtarParams["DomainPath"] . "/public" . $AttachmentPath;
            } else {
                $UploadDir = public_path() . $AttachmentPath;
            }

            if (!is_dir($UploadDir)) {
                $makeDirectory = File::makeDirectory($UploadDir, 0775, true);
            }

            $file_name = Str::random() . date("Ymdhisu") . '.' . $extension;
            $putFilePath = $UploadDir . '/' . $file_name;

            if (file_put_contents($putFilePath, $decode_file)) {

                return $AttachmentPath . '/' . $file_name;
            }
        } catch (Exception $e) {
            return array("Error" => "Error Occured while uploading file. Exception Msg: " . $e->getMessage());
        }
    }

    public static function SaveFileAndGetPath($Attachment, $AttachmentPath)
    {
        $ErrorMsg = "";
        try 
        {
            // return $Attachment->getClientOriginalExtension();
            if ($Attachment == null) {
                return null;
            }

            if ($ErrorMsg == "") 
            {
                $AttachmentPath = $AttachmentPath.date("Y").'/'.date("F");
                $extension = $Attachment->getClientOriginalExtension();
                $move_file_path = public_path() . $AttachmentPath;
                $move_file_name = Str::random() . date("Ymdhisu") . '.' . $extension;

                $SavingFilePath = $AttachmentPath."/".$move_file_name;
                $FileMoved = $Attachment->move($move_file_path, $move_file_name);
            }
        } 
        catch (\Throwable $e) 
        {
            $ErrorMsg = "Error Occured while uploading file. Exception Msg: " . $e->getMessage();
            return array("reply"=> 0 ,"status"=> false ,"msg" => $ErrorMsg);
        }
        if ($ErrorMsg == "") 
        {
            return array("reply"=> 1 ,"status"=> true ,"msg" => "File Uploaded Successfully.", "path" => $SavingFilePath);
        }
        else
        {
            return array("reply"=> 0 ,"status"=> false ,"msg" => $ErrorMsg);
        }

    }

    public static function GetAmunity($EventId)
    {
        return Event::where("id" , $amunities_id)
                            ->with("EventCategory")
                            ->with("EventGallery")
                            ->with("EventAttributes")
                            ->with("EventTimeSlots")
                            ->with("EventTables")
                            ->with("EventRooms")
                            ->with("EventReviews");
    }
    public static function GetUserDetails($UserId)
    {
        return  User::where("id" , $UserId)
                    ->with("Member:id,user_id,first_name,last_name,email,profile_pic,phone_code,phone_no,address,isInterestedAnswers")
                    ->with("UserDeviceInfo")
                    ->select("id","user_type_id","name","email","provider","provider_id","stripe_customer_id")
                    ->first();
    }

    public static function GetEventReservationDetails($ReservationId)
    {
        return Event_reservation::where("id" , $ReservationId)
                            ->with("Event_reservation_room")
                            ->with("Event_reservation_room.EventRoom")
                            ->with("Event_reservation_table")
                            ->with("Event_reservation_table.EventTable")
                            ->with("Event_reservation_time_slot")
                            ->with("Event_reservation_time_slot.EventTimeSlot")
                            ->with("Event_reservation_business")
                            ->with("Event_reservation_business.EventDay")
                            ->with("Event.EventGallery")
                            ->with("Event.EventAttributes")
                            ->with("Event.EventCategory:id,event_category_name,parent_category_id")
                            ;
    }

    public static function GetEventDetails($EventId)
    {
        return Event::where("id" , $EventId)
                            ->with("EventCategory")
                            ->with("EventGallery")
                            ->with("EventAttributes")
                            ->with("EventTimeSlots")
                            ->with("EventTables")
                            ->with("EventRooms")
                            ->with("EventReviews");
    }

    public static function GetEventSelectedColums($isRelationColums=false)
    {
        if ($isRelationColums) 
        {
            $colums = "id,event_title,event_type,company_id,company_user_id,event_category_id,event_attachment,cover_attachment,description,image_gallery,start_date,end_date,start_time,end_time,amount,discount_amount,discount_in_percentage,address,latitude,longitude,isActive";
            
        }
        else
        {
            $colums = ["event_title","event_type","company_id","company_user_id","event_category_id","event_attachment","cover_attachment","description","image_gallery","start_date","end_date","start_time","end_time","amount","discount_amount","discount_in_percentage","address","latitude","longitude","isActive"];
        }
        return $colums;

    }

    public static function GetEventReservationSelectedColums($isRelationColums=false)
    {
        if ($isRelationColums) 
        {
            $colums = "id,event_title,event_type,event_id,member_id,member_user_id,company_id,company_user_id,
                            reservation_date,total_amount,reserved_quantity";
            
        }
        else
        {
            $colums = [
                        "id","event_title","event_type","event_id","member_id","member_user_id","company_id","company_user_id","reservation_date","total_amount","reserved_quantity"
                    ];
        }
        return $colums;

    }

    public static function TimeStampWithTimeZone($timestamp)
    {
        $TimeZoneTimeStamp = !empty($timestamp) ? (new DateTime($timestamp))->format('c') : null;
        return $TimeZoneTimeStamp;
    }

    public static function SendSms($from_number,$message)
    {

        $basic  = new \Nexmo\Client\Credentials\Basic('380fcb74', 'gGP1CNX0vX9gK2Dp');
        $client = new \Nexmo\Client($basic);

        $message = $client->message()->send([
            'to' => $from_number,
            'from' => 'Vonage APIs',
            'text' => $message
        ]);

        if ($message) 
        {
            return true;
        }
    }

}